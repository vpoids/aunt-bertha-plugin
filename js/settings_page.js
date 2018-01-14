// define the top level and service tag arrays based on the openeligibility taxonomy
var taxonomy_arr = {
  "transit":["Help Pay for Transit","Transportation"],
  "emergency":["Disaster Response","Emergency Payments","Emergency Food","Temporary Shelter","Help Find Missing Persons","Immediate Safety","Psychiatric Emergency Services"],
  "food":["Community Gardens","Emergency Food","Food Delivery","Food Pantry","Free Meals","Help Pay for Food","Nutrition Education"],
  "housing":["Temporary Shelter","Help Find Housing","Help Pay for Housing","Maintenance & Repairs","Housing Advice","Residential Housing"],
  "goods":["Baby Supplies","Clothing","Home Goods","Medical Supplies","Personal Safety","Toys & Gifts"],
  "health":["Addiction & Recovery","Dental Care","End-of-Life Care","Health Education","Help Pay for Healthcare","Medical Care","Mental Health Care","Postnatal Care","Prevent & Treat","Primary Care","Drug Testing","Vision Care"],
  "money":["Financial Assistance","Government Benefits","Financial Education","Insurance","Tax Preparation"],
  "care":["Adoption & Foster Care","","Animal Welfare","Daytime Care","End-of-Life Care","Navigating the System","Physical Safety","Residential Care","Support Network"],
  "education":["Help Find School","Help Pay for School","More Education","Preschool","Screening & Exams","Skills & Training"],
  "work":["Help Find Work","Help Pay for Work Expenses","Skills & Training","Supported Employment","Workplace Rights"],
  "legal":["Advocacy & Legal Aid","Mediation","Notary","Representation","Translation & Interpretation"]
};

function add_service_tag_options(top_level) {
  // clear out the existing options
  jQuery('#service_tag').find('option:not(:first)').remove();
  jQuery.each(taxonomy_arr[top_level],function(i,v) {
  	var option_html = "<option value=\"" + v + "\"";
  	if (v == jQuery("#current_service_tag").val()) option_html+= " selected=\"selected\"";
  	option_html+= ">" + v + '</option>'
    jQuery("#service_tag").append(option_html);
  });	
}

jQuery(document).ready(function() {
  // set the service tag field initially
  if (jQuery("#top_level").val() == "none") jQuery("#service_tag").prop("disabled",true);
  if (jQuery("#top_level").val() != "none") {
    jQuery("#service_tag").prop("disabled",false);
    add_service_tag_options(jQuery("#top_level").val());
  }
   	
  // register the change event for the top_level field choice that populates the service tag options 	
 	jQuery("#top_level").change(function(u,i) {
    if (jQuery("#top_level").val() == "none") jQuery("#service_tag").prop("disabled",true);
    if (jQuery("#top_level").val() != "none") {
    	jQuery("#service_tag").prop("disabled",false);
    	add_service_tag_options(jQuery("#top_level").val());
    }
  });

 	jQuery("#ab_settings_form").submit(function(event) {
 		// validate the data entry
 		err_flag = 0;
 		// add the leading # to the hex value if the user did not
    if (jQuery("#btn_color").val() != "") {
    	var btn_color = jQuery("#btn_color").val();
    	if (btn_color[0] != "#") jQuery("#btn_color").val("#" + jQuery("#btn_color").val());
    } 
    if (jQuery("#btn_text_color").val() != "") {
    	var btn_text_color = jQuery("#btn_text_color").val();
    	if (btn_text_color[0] != "#") jQuery("#btn_text_color").val("#" + jQuery("#btn_text_color").val());
    } 
    // the service tag is required if a top level category is chosen
 		if (jQuery("#top_level").val() != "none" && jQuery("#service_tag").val() == "none") {
      var err_div = "<p id=\"err_top_level\" class=\"error-list\">Service tag is required if a top level category is specified</p>";
      jQuery("#service_tag_description").after(err_div);
      err_flag = 1;
    };
 		if (!jQuery("#ref_domain").val()) {
      var err_div = "<p id=\"err_ref_domain\" class=\"error-list\">Referral domain is required. The referral domain identifies the source of the search.</p>";
      jQuery("#ref_domain_description").after(err_div);
      err_flag = 1;
    };
 		if (!jQuery("#partner_id").val()) {
      var err_div = "<p id=\"err_partner_id\" class=\"error-list\">Partner ID is required. If you do not have a partner ID, please contact the Aunt Bertha Community Engagement Team.</p>";
      jQuery("#partner_id_description").after(err_div);
      err_flag = 1;
    };

    if (err_flag == 1) {
 		  return false;
 		}
 	});
});