////////////////
//UTIL FUNCTIONS
jQuery.cookie = function (key, value, options) {
	if (arguments.length > 1 && String(value) !== "[object Object]") {
		options = jQuery.extend({}, options);
		if (value === null || value === undefined) {
			options.expires = -1;
		}
		if (typeof options.expires === 'number') {
			var days = options.expires,
				t = options.expires = new Date();
			t.setDate(t.getDate() + days);
		}
		value = String(value);
		return (document.cookie = [
		encodeURIComponent(key), '=',
		options.raw ? value : encodeURIComponent(value),
		options.expires ? '; expires=' + options.expires.toUTCString() : '',
		options.path ? '; path=' + options.path : '',
		options.domain ? '; domain=' + options.domain : '',
		options.secure ? '; secure' : ''].join(''));
	}
	options = value || {};
	var result, decode = options.raw ? function (s) {
			return s;
		} : decodeURIComponent;
	return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};

var gigyaUtil = {
	debug: true
	,getContext: function() {
		var d=new Date();
		var unixtime = Math.floor(d.getTime() / 1000);
		return {
			cid: window.location.hostname
			,url: window.location.href
			,timestamp: unixtime
		};
	}
	,showUser: function(user) {
		jQuery(".gigya-first-name").html(user.firstName);
		jQuery(".gigya-last-name").html(user.lastName);
		if( undefined != user.thumbnailURL && null != user.thumbnailURL ){
			jQuery(".gigya-thumbnail").attr("src",user.thumbnailURL);
			jQuery(".gigya-thumbnail").show();
		}

		if( undefined != user.photoURL && null != user.photoURL ){
			jQuery(".gigya-photo").attr("src",user.photoURL);
			jQuery(".gigya-photo").show();
		}
	}
	,showLoggedIn: function() {
		if(gigyaUtil.debug) console.log("ShowLoggedIn called...");

		jQuery(".gigya-logged-out").hide();
		jQuery(".gigya-logged-in").show();
	}
	,showLoggedOut: function() {
		if(gigyaUtil.debug) console.log("ShowLoggedOut called...");
		
		jQuery(".gigya-logged-in").hide();
		jQuery(".gigya-thumbnail").hide();
		jQuery(".gigya-photo").hide();
		jQuery(".gigya-logged-out").show();			
	}
	,showLoginModal: function() {
		if(gigyaUtil.debug) console.log("showLoginModal() called...");
		
		var context = gigyaUtil.getContext();
			context.event = "login";
		gigya.accounts.showScreenSet({
			screenSet:'Login-web'
			,startScreen:'gigya-login-screen'
			,context: context
			,cid: context.cid
			,onError:function(e) {
				if(gigyaUtil.debug) console.log(e);
			}
			,onBeforeScreenLoad:function(e) {
				//if(gigyaUtil.debug) console.log(e);
			}
		});
	}
	,showRegistrationModal: function() {
		if(gigyaUtil.debug) console.log("showRegistrationModal() called...");
		
		var context = gigyaUtil.getContext();
			context.event = "registration";
		gigya.accounts.showScreenSet({
			screenSet:'Login-web'
			,startScreen:'gigya-register-screen'
			,context: context
			,cid: context.cid
			,onError:function(e) {
				if(gigyaUtil.debug) console.log(e);
			}
			,onBeforeScreenLoad:function(e) {
				//if(gigyaUtil.debug) console.log(e);
			}
		});
	}
	,showProfileModal: function() {
		if(gigyaUtil.debug) console.log("showProfileModal() called...");
		
		var context = gigyaUtil.getContext();
			context.event = "profile";
		gigya.accounts.showScreenSet({
			screenSet:'Profile-web'
			,startScreen:'gigya-update-profile-screen'
			,context: context
			,cid: context.cid
			,onError:function(e) {
				if(gigyaUtil.debug) console.log(e);
			}
			,onBeforeScreenLoad:function(e) {
				//if(gigyaUtil.debug) console.log(e);
			}
			,onAfterSubmit:function(e) {
				if(gigyaUtil.debug) console.log(e);

				gigyaUtil.updateProfile(context);

			}
		});
	}
	,updateProfile: function(context) {
		if( undefined == context) {
			context = gigyaUtil.getContext();
		}
		
		if(gigyaUtil.debug) console.log("getting account info...");

		gigya.accounts.getAccountInfo({
			//include: 'profile,data',
			cid: context.cid
			,context: context
			,callback: function(e) {

				if( undefined != e ) {
					if(gigyaUtil.debug) console.log(e);

					if(gigyaUtil.debug) console.log("...received account info");
	
					//AJAX call to WP to create guest author account
					e.action = "gigya_makeblog_update";
					jQuery.ajax({
		
						type: "POST"
						,cache: false
						,url: "/wp-admin/admin-ajax.php"
						,data: e
						,success: function(data, textStatus, jqXHR) {
							if(gigyaUtil.debug) console.log(data);
							
							if( data.complete ) {
								if(gigyaUtil.debug) console.log("WP profile info update success!");
							} else {
								if(gigyaUtil.debug) console.log("WP profile info update FAIL!");
							}
		
						}
						,error: function(jqXHR, textStatus, errorThrown) {
							if(gigyaUtil.debug) console.log(textStatus+": "+errorThrown);
						}
		
					});
				}
				
			}
		});
				
	}
	,logout: function() {
		if(gigyaUtil.debug) console.log("logout() called...");
		
		//set ui
		gigyaUtil.showLoggedOut();

		//clear cookies
		jQuery.cookie('gigyaLoggedIn', null, { path: '/' });
		jQuery.cookie('gigyaUser', null, { path: '/' });

		var context = gigyaUtil.getContext();
			context.event = "logout";
		var d = {};
		d.lastLogout = {
			url: context.url
			,timestamp: context.timestamp
		}

		//store event
		gigya.accounts.setAccountInfo({
			data: d
			,cid: context.cid
			,context: context
			,callback:function(r) {
				//if(gigyaUtil.debug) console.log(r);
				if(gigyaUtil.debug) console.log("logout url stored");
			}
		});
		
		setTimeout(function() {

			//logout of gigya
			gigya.accounts.logout({
				context: context
				,cid: context.cid
				,callback:function(r) {
					if(gigyaUtil.debug) console.log("...logged out");
				}
			});

		},1500);
	}
	,getUserSkeleton: function(raw) {
		var u = {
			firstName: raw.firstName
			,lastName: raw.lastName
		};

		if( undefined != raw.thumbnailURL && null != raw.thumbnailURL ){
			u.thumbnailURL = raw.thumbnailURL;
		}

		if( undefined != raw.photoURL && null != raw.photoURL ){
			u.photoURL = raw.photoURL;
		}

		return u;
	}
	,trackEvent: function(e) { //for Omniture
//				if(gigyaUtil.debug) console.log("trackEvent() called");
//				if(gigyaUtil.debug) console.log(e);

		var action = "";

		if("logout" == e.eventName) { //logout
			action = e.eventName + ": gigya";

		} else { //registration or login

			action = e.eventName + ": " +  e.provider;
			var data = e.data; //data object in Gigya profile

			if( undefined == data.registration || null == data.registration ) {
				//this is a user registration
				action = "registration: " +  e.provider;
			}
		}

		// Report the event to Omniture - the "Custom Link Tracking" code:
//				s.linkTrackVars="action,events";
//				s.linkTrackEvents="GigyaSocialEvents";
//				s.events="GigyaSocialEvents";
//				s.action=action; 
//				s.tl(this,'o', action);
		
//		if(gigyaUtil.debug) console.log("trackEvent() end reached");
	}
	,testESP: function() {

		var d = {};
		d.action = "test_esp";
		jQuery.ajax({

			type: "POST"
			,cache: false
			,url: "/wp-admin/admin-ajax.php"
			,data: d
			,success: function(data, textStatus, jqXHR) {
				if(gigyaUtil.debug) console.log(data);
				
				if( data.complete ) {
					if(gigyaUtil.debug) console.log("success!");
				} else {
					if(gigyaUtil.debug) console.log("fail!");
				}

			}
			,error: function(jqXHR, textStatus, errorThrown) {
				if(gigyaUtil.debug) console.log(textStatus+": "+errorThrown);
			}

		});

	}
	,searchEspEmail: function() {

		var email = jQuery("#input_esp_email").val();
		
		var d = {};
		d.action = "esp_acct_search";
		d.email = email;
		
		jQuery.ajax({

			type: "POST"
			,cache: false
			,url: "/wp-admin/admin-ajax.php"
			,data: d
			,success: function(data, textStatus, jqXHR) {
				if(gigyaUtil.debug) console.log(data);
				
				if( data.complete ) {
					if(gigyaUtil.debug) console.log(data.esp_normalized);
					
					//confirm w/ user
					gigyaUtil.showEspConfirm(data.esp_normalized);
					
				} else {
					if(gigyaUtil.debug) console.log("no joy");
				}

			}
			,error: function(jqXHR, textStatus, errorThrown) {
				if(gigyaUtil.debug) console.log(textStatus+": "+errorThrown);
			}

		});		
	}
	,searchEspAcctno: function() {
		
		var acctno = jQuery("#input_esp_acctno").val();
		
		var d = {};
		d.action = "esp_acct_search";
		d.acctno = acctno;
		
		jQuery.ajax({

			type: "POST"
			,cache: false
			,url: "/wp-admin/admin-ajax.php"
			,data: d
			,success: function(data, textStatus, jqXHR) {
				if(gigyaUtil.debug) console.log(data);
				
				if( data.complete ) {
					if(gigyaUtil.debug) console.log(data.esp_normalized);
					
					//confirm w/ user
					gigyaUtil.showEspConfirm(data.esp_normalized);

				} else {
					if(gigyaUtil.debug) console.log("no joy");
				}

			}
			,error: function(jqXHR, textStatus, errorThrown) {
				if(gigyaUtil.debug) console.log(textStatus+": "+errorThrown);
			}

		});
	}
	,showEspConfirm: function(esp) {
		jQuery('.esp_uid').html(esp.uid);
		jQuery('#esp_uid').val(esp.uid);
		jQuery('.esp_acctno').html(esp.acctno);
		jQuery('#esp_acctno').val(esp.acctno);
		jQuery('#esp_accttype').val(esp.accttype);
		jQuery('#esp_status').val(esp.status);
		jQuery('#esp_expiredate').val(esp.expiredate);
		
		jQuery('#modal_esp_confirm').modal('show');
	}

};

/////////////
// SET EVENTS
gigya.accounts.addEventHandlers({
	onLogin: function(e) {
		if(gigyaUtil.debug) console.log("onLogin event fired");

		//use this event to turn off 3 click and start pay wall monitoring
		if(gigyaUtil.debug) console.log(e); //debug event object
		
		//set ui
		var profile = e.profile;
		var data = e.data;
		gigyaUtil.showUser(profile);
		gigyaUtil.showLoggedIn();
		
		//set cookies
		var now=new Date();
		var expiresDate=new Date();
		var skel = gigyaUtil.getUserSkeleton(profile);
		var json = JSON.stringify(skel);
		expiresDate.setDate(now.getDate() + 14);
		jQuery.cookie('gigyaLoggedIn', e.UID,  { expires: expiresDate, path: '/' });
		jQuery.cookie('gigyaUser', json,  { expires: expiresDate, path: '/' });
		
		//track event
		gigyaUtil.trackEvent(e);
		
		//store event
		var c = gigyaUtil.getContext();
		var d = {};
		d.lastLogin = {
			url: c.url
			,timestamp: c.timestamp
		};
		
		if( undefined == data.registration || null == data.registration ) { //this is a registration
			if(gigyaUtil.debug) console.log("setting reg URL");
			
			//set registration tracking
			d.registration = {
				url: c.url
				,timestamp: c.timestamp
			};
			d.cid = c.cid;
		}

		if( e.UID.match(/^_guid_/) ) { //this is a registration
			if(gigyaUtil.debug) console.log("this is a registration");

			//AJAX call to WP to create guest author account
			e.action = "gigya_makeblog_register";
			jQuery.ajax({

				type: "POST"
				,cache: false
				,url: "/wp-admin/admin-ajax.php"
				,data: e
				,success: function(data, textStatus, jqXHR) {
					if(gigyaUtil.debug) console.log(data);
					
					if( data.complete ) {
						var newid = data.siteUID;
	
						//update user id
						jQuery.cookie('gigyaLoggedIn', null, { path: '/' });
						jQuery.cookie('gigyaLoggedIn', newid,  { expires: expiresDate, path: '/' });
					} else {
						if(gigyaUtil.debug) console.log(data.message);
					}

				}
				,error: function(jqXHR, textStatus, errorThrown) {
					if(gigyaUtil.debug) console.log(textStatus+": "+errorThrown);
				}
				,complete: function(jqXHR, textStatus) {
					if(gigyaUtil.debug) console.log("reg complete");
					
					gigya.accounts.setAccountInfo({
						data: d
						,cid: c.cid
						,context: c
						,callback:function(r) {
							if(gigyaUtil.debug) console.log("reg URL stored");
							//if(gigyaUtil.debug) console.log(r);
						}
					});
				}

			});

		} else { //this is a login
			if(gigyaUtil.debug) console.log("this is a login");

			gigya.accounts.setAccountInfo({
				data: d
				,cid: c.cid
				,context: c
				,callback:function(r) {
					if(gigyaUtil.debug) console.log("login URL stored");
					//if(gigyaUtil.debug) console.log(r);
				}
			});
			
		}
		
		//check for ESP account
		if(gigyaUtil.debug) console.log("checking if user has esp acct");
		if( undefined != data.is_esp && data.is_esp) { //Make Magazine subscriber
			if(gigyaUtil.debug) console.log("esp checkbox checked");

			if( undefined == data.esp ) { //user has not linked ESP acct
				if(gigyaUtil.debug) console.log("no esp object found");

				//prompt user for ESP info
				if( undefined != profile.email && '' != profile.email ) {
					jQuery("#input_esp_email").val(profile.email);
				}
				jQuery('#modal_esp_link').modal('show');

			} else { //ESP acct info has been set in Gigya
				if(gigyaUtil.debug) console.log(data.esp);
			}
		}

	}
	,onLogout: function(e) {
		//use this event to do any cleanup after user is logged out
		//if(gigyaUtil.debug) console.log(e); //debug event object
		
		//clear cookies
		jQuery.cookie('gigyaLoggedIn', null, { path: '/' });
		
		//set ui
		gigyaUtil.showLoggedOut();				

		//track event
		gigyaUtil.trackEvent(e);
	}
});

//////////////////
// HANDLE LOGIN UI
jQuery(document).ready(function() {
	
	if( jQuery.cookie('gigyaLoggedIn') != null ) {
		
		if( jQuery.cookie('gigyaUser') != null ) {
			var user = JSON.parse( jQuery.cookie('gigyaUser') );
			gigyaUtil.showUser(user);
			gigyaUtil.showLoggedIn();

		} else { //call getUserInfo

			gigya.accounts.getAccountInfo({
				callback:function(r) {
					if(r.errorCode == 0) {
						var u = gigyaUtil.getUserSkeleton(r.user);
						var json = JSON.stringify(skel);
						expiresDate.setDate(now.getDate() + 14);
						jQuery.cookie('gigyaLoggedIn', r.UID,  { expires: expiresDate, path: '/' });
						jQuery.cookie('gigyaUser', json,  { expires: expiresDate, path: '/' });
		
						gigyaUtil.showUser(user);
						gigyaUtil.showLoggedIn();
					} else {
						if(gigyaUtil.debug) console.log("user logged in, no user info, getAccountInfo() failed!");
					}
				}
			});
		}
	}
});