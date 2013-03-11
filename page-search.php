<?php
/**
 * @package MakeZine
 * Template Name: MAKE Search
 */
?>

<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<?php if (!is_home()) { ?>

							<ul class="breadcrumb">
			
								<?php if(class_exists('bcn_breadcrumb_trail')) {
									$breadcrumb_trail = new bcn_breadcrumb_trail;
									$breadcrumb_trail->opt['home_title'] = "Home";
									$breadcrumb_trail->opt['current_item_prefix'] = '<li class="current">';
									$breadcrumb_trail->opt['current_item_suffix'] = '</li>';
									$breadcrumb_trail->opt['separator'] = '<span class="divider">&nbsp;/&nbsp;</span>';
									$breadcrumb_trail->opt['home_prefix'] = '<li>';
									$breadcrumb_trail->opt['home_suffix'] = '</li>';
									$breadcrumb_trail->opt['max_title_length'] = 70;
									$breadcrumb_trail->fill();
									$breadcrumb_trail->display();
								} ?>
										
							</ul>

						<?php } ?>

						<div class="content">

							<?php make_search_header(); ?>

							<form class="well search" method="get">
								<input type="text" value="<?php echo esc_attr( $_GET['q'] ); ?>" id="q" name="q" class="input-medium search-query">
								<button type="submit" class="btn primary">Search</button>
								
								<?php make_pop_terms(); ?>
								
							</form>
							
							<style>

								table {
									width: 100%;
									margin-bottom: 18px;
									padding: 0;
									border-collapse: separate;
									font-size: 13px;
									border: 0px;
									-webkit-border-radius: 0px;
									-moz-border-radius: 0px;
									border-radius: 0px;
								}

								table th + th, table td + td {
									border-left: 0px;
								}

								table th, table td {
									padding: 0px;
									line-height: 18px;
									text-align: left;
								}

								.gsc-imageResult {
									float: left;
									margin-bottom: 1em;
									margin-right: 14px !important;
								}

							</style>
								
							<?php //make_search(); ?>

							<div id="cse" style="width: 100%;">Loading</div>
							<script src="http://www.google.com/jsapi" type="text/javascript"></script>
							<script type="text/javascript"> 
								google.load('search', '1', {language : 'en', style : google.loader.themes.V2_DEFAULT});
								google.setOnLoadCallback(function() {
									var customSearchOptions = {};
									var imageSearchOptions = {};
									imageSearchOptions['layout'] = google.search.ImageSearch.LAYOUT_CLASSIC;
									customSearchOptions['enableImageSearch'] = true;
									customSearchOptions['imageSearchOptions'] = imageSearchOptions;
									var googleAnalyticsOptions = {};
									googleAnalyticsOptions['queryParameter'] = 'q';
									googleAnalyticsOptions['categoryParameter'] = '';
									customSearchOptions['googleAnalyticsOptions'] = googleAnalyticsOptions;
									customSearchOptions['adoptions'] = {'layout': 'noTop'};
									var customSearchControl = new google.search.CustomSearchControl(
										'008032414425079535247:kplxrakvu20', customSearchOptions);
									customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
									var options = new google.search.DrawOptions();
									options.setAutoComplete(true);
									options.enableSearchResultsOnly(); 
									customSearchControl.draw('cse', options);
									function parseParamsFromUrl() {
										var params = {};
										var parts = window.location.search.substr(1).split('\x26');
										for (var i = 0; i < parts.length; i++) {
										var keyValuePair = parts[i].split('=');
										var key = decodeURIComponent(keyValuePair[0]);
										params[key] = keyValuePair[1] ?
											decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
											keyValuePair[1];
										}
										return params;
									}

									var urlParams = parseParamsFromUrl();
									var queryParamName = "q";
									if (urlParams[queryParamName]) {
										customSearchControl.execute(urlParams[queryParamName]);
									}
								}, true);
							</script>
												 

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>