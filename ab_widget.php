<?php
$ab_widget_html = '
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/wp-content/plugins/aunt_bertha/css/default.css?v=1801101">
      <div id="search-info" class="form-container" style="'.$container_css.'" data-widget="'.$partner_id.'" data-ref="'.$ref_domain.'" data-top-level="'.$top_level.'" data-service-tag="'.$service_tag.'">
         <div class="form-desc">
           '.$search_desc.'
         </div>
      <form id="search-form" role="search" class="form-inline" method="get" target="_blank"
        action="https://www.auntbertha.com/search/text"><div id="postal-container" class="control-group">
            <label class="sr-only" for="postal">Zip code</label>
            <input type="text" id="postal" name="postal" maxlength="5" placeholder="'.$placeholder.'"
              class="form-field required zipcode numeric" required style="">
            <button type="submit" class="btn search-button" style="'.$btn_style.'">'.$btn_text.'</button>
            <div class="error-msg">Please enter a valid 5-digit US ZIP code</div>
            <div class="search-branding">
              Powered by <a target="_blank" href="http://www.auntbertha.com/"><img alt="Aunt Bertha"
                src="/wp-content/plugins/aunt_bertha/images/logo.png" role="presentation" aria-hidden="true">
                <span class="sr-only">Aunt Bertha</span></a>
            </div>
          </div>
        </form>
      </div>

    <script src="https://code.jquery.com/jquery-1.8.2.min.js" integrity="sha256-9VTS8JJyxvcUR+v+RTLTsd0ZWbzmafmlzMmeZO9RFyk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/wp-content/plugins/aunt_bertha/js/widgets_v2.js?v=1801101"></script>
';