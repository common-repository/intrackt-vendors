<?php
namespace Intrackt\Vendors;

/*
 * load the source for any required classes or files
 */
require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-PageLog.php' );
require_once(\ABSPATH.'/wp-admin/includes/template.php');

/*
 * The PageMain class defines and processes the Vendors main page
 */
class PageMain {

    /*
     * Have we instantiated the class-- this is a singleton and does not produce children
     */
	private static $initiated = false;
    
    /*
     * Init class
     */
	public static function init() {
        
        //PageLog::updateTestLog("PageMain::init executed");
        
		if ( ! self::$initiated ) {
    		self::$initiated = true;

		}
        
	}
    
    /*
     * display some html in the section
     */
    public static function page01Section01Text() {

        ?>
        <div id="intrackt_controls" style="display: none">
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page01Section02Text() {

        ?>
        </div>
        <div id="intrackt_menu" style="display: none">
        <h3 style='font-size: 1.15em;'>List Admin Menu Items to Hide or Rename for Vendors</h3>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section01Text() {

        ?>
        </div>
        <div id='intrackt_productgeneral' style='display: none'>
        <div class='intrackt_noproductaddedit'><br><p style='color: red; display: inline;'><b>To enable these settings go to the "Controls" tab and set "Enable Vendor Product Add/Edit options" to "Yes".</b></p></div>
        <h3 style='font-size: 1.15em;'>Simplify Vendor's Product Add/Edit</h3>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section02Text() {

        ?>
        </div>
        <div id='intrackt_producttypes' style='display: none'>
        <div class='intrackt_noproductaddedit'><br><p style='color: red; display: inline;'><b>To enable these settings go to the "Controls" tab and set "Enable Vendor Product Add/Edit options" to "Yes".</b></p></div>
        <h3 style='font-size: 1.15em;'>List Product Types to Hide or Rename when Vendors Are Adding Products</h3>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section03Text() {

        ?>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section04Text() {

        ?>
        </div>
        <div id='intrackt_producttabs' style='display: none'>
        <div class='intrackt_noproductaddedit'><br><p style='color: red; display: inline;'><b>To enable these settings go to the "Controls" tab and set "Enable Vendor Product Add/Edit options" to "Yes".</b></p></div>
        <h3 style='font-size: 1.15em;'>List Product Data Tabs to Hide or Rename when Vendors Are Adding Products</h3>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section05Text() {

        ?>
        </div>
        <div id='intrackt_productblocks' style='display: none'>
        <div class='intrackt_noproductaddedit'><br><p style='color: red; display: inline;'><b>To enable these settings go to the "Controls" tab and set "Enable Vendor Product Add/Edit options" to "Yes".</b></p></div>
        <h3 style='font-size: 1.15em;'>List Product Edit Blocks to Hide or Rename when Vendors Are Adding Products<br>(Such as "Product Categories", "Product short description", "Product data", or "Product Gallery")</h3>
        <?php
    
    }

    /*
     * display some html in the section
     */
    public static function page02Section06Text() {

        ?>
        </div>
        <div id='intrackt_productother' style='display: none'>
        <div class='intrackt_noproductaddedit'><br><p style='color: red; display: inline;'><b>To enable these settings go to the "Controls" tab and set "Enable Vendor Product Add/Edit options" to "Yes".</b></p></div>
        <h3 style='font-size: 1.15em;'>List Arbitrary Content to Rename or Hide From the Vendor.</h3>
        <div id="page02Section06TextShowInstructions" style="display: inline"><button type='button' id="page02Section06TextShowInstructionsButton">Instructions</button></div>
        <div id="page02Section06TextHideInstructions" style="display: none"><button type='button' id="page02Section06TextHideInstructionsButton">Hide Instructions</button><br>
            <p>To rename or hide an element on the page when a vendor is adding or editing a page, do the following:</p>
            <ul id='mainarbitraryinstructions'>
                <li>Edit an existing product (You will not need to make changes, so any product will work here.)</li>
                <li>Right click on the text label of the field you wish to hide and then click "Inspect" from the menu that appears.</li>
                <li>Determine the HTML element (tag) that contains the text.  It might be an "input", "label", "div", "span", or something else.
                    Enter that name without the &lt; or &gt; in the first column.</li>
                <li>In the second column enter the text that is contained in the "value" field (if an input tag) or between the tag and the &lt;/tag&gt;.
                    Upper and lower case is ignored and a partial match is accepted, but be as complete as you can.</li>
                <li>In the third column check the checkbox if you are wanting to hide the product.  Leave it unchecked or uncheck it if you want to rename the element.</li>
                <li>If you do not check the box, then in the fifth column enter the new name to replace the text in column 2. Here case matters.</li>
                <li>If you do check the box, then in the fourth column goes the name of the tag that contains all the content you want hidden.
                    This tag should surround the tag you entered in column 1 and any other content such as editable fields that hold the content the text refers to.
                    It also does not need to be the immediate tag holding the content.  There could be a hierarchy of tags between the tag holding the text and the tag
                    you want to hide.  You only need to name the tag you want to hide.
                    (If all you want is for the current tag to be hidden, then leave this column blank.
                    Also, the content will be hidden but any values already in the field will be used when the product is added or updated.)</li>
                <li>If the tag containing the text you selected is contained in a tag of the same name as a more global tag you want to be the one hidden,
                    enter the tag name as many times as necessary separated by dots. So if the tag with the text is surrounded with an 'a' tag which is in a 'div' tag
                    which is in a 'span' tag which is the 'div' tag you actually want to hide, then place "div.div" in the field.
                <li>To test what you are doing:
                    <span style='left-margin: 40px'>
                    <ul id='secondarbitraryinstructions'>
                        <li>Keep your current admin open.</li>
                        <li>Open a new browser window using a broswer in incognito mode.</li>
                        <li>In that browser, visit your website storefront and register a new user as a vendor</li>
                        <li>Back in your own admin in the original browser window, approve this new vendor</li>
                        <li>Back on the ingognito brower, use the option to switch the vendor to the admin so that he can add his own products.</li>
                        <li>As the vendor, go to the "Add Product" page, or even add a product and edit the product.</li>
                        <li>The content you have renamed should be renamed and the content you have hidden should be hidden.</li>
                    </ul>
                    </span>
                </li>
            </nl>
        </div>
        <style>
            #mainarbitraryinstructions {
                list-style: disc outside none; 
                margin-left: 0; 
                padding-left: 1em;
            }
            #secondarbitraryinstructions {
                list-style: disc outside none; 
                margin-left: 0; 
                padding-left: 20px;
                padding-top: 5px;
            }
        </style>
        <?php
    
    }

    /*
     * display some html in the section
     */
    //public static function page03Section01Text() {

    //    echo "
    //    <h3 style='font-size: 1.15em;'>Simplify Vendor's Product Booster Multi-Currency Add/Edit</h3>
    //    <p><b>Remaining settings are ignored if first setting is \"No\".</b></p>
    //    ";

    //}

    /*
     * display some html in the section
     */
    //public static function page05Section01Text() {

    //    echo "
    //    <h3 style='font-size: 1.15em;'>Simplify Vendor's Product Gravity Forms when Add/Edit</h3>
    //    ";

    //}

    /*
     * validate input values
     */
    public static function optionsValidate($input) {
        
        //global $activeTab;

        /*
         * Get the options
         */
        $options = \get_option('intrackt_vendors');
        
        /*
         * Validate all the options from this form (leaving others untouched)
         * If validation failed, don't change exising value.
         */
        $option=\trim($input['intrackt_vendors_simplevendorform']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['simplevendorform'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_dashboardconsignprompt']);
        if (\preg_match('/^[a-z0-9!\?\.\(\),:;@#\$%^&\*_ ]{1,64}$/i', $option)) {
            $options['dashboardconsignprompt'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_dashboardmanageprompt']);
        if (\preg_match('/^[a-z0-9!\?\.\(\),:;@#\$%^&\*_ ]{1,64}$/i', $option)) {
            $options['dashboardmanageprompt'] =$option;
        }
        
        //$option=\trim($input['intrackt_vendors_newordertoemail']);
        //if (\preg_match('/^[01]{1,1}$/i', $option)) {
        //    $options['newordertoemail'] =$option;
        //}
        
        $option=\trim($input['intrackt_vendors_hideordervendorname']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['hideordervendorname'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_hidevendoroffers']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['hidevendoroffers'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_simplevendorproductedit']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['simplevendorproductedit'] =$option;
        }
        
        $optionTable=self::processHiddenAdminMenus($input['intrackt_vendors_hiddenadminmenus']);
        foreach ($optionTable as $option) {
            $option['oldname']=\wp_kses($option['oldname'],\wp_kses_allowed_html('post'));
            $option['hide']=(($option['hide']==1)?1:0);
            $option['newname']=\wp_kses($option['newname'],\wp_kses_allowed_html('post'));
        }
        $options['hiddenadminmenus']=$optionTable;
        
        $optionTable=self::processHiddenProductTypes($input['intrackt_vendors_hiddenproducttypes']);
        foreach ($optionTable as $option) {
            $option['oldname']=\sanitize_text_field($option['oldname']);
            $option['hide']=(($option['hide']==1)?1:0);
            $option['newname']=\sanitize_text_field($option['newname']);
        }
        $options['hiddenproducttypes']=$optionTable;
        
        $optionTable=self::processHiddenProductDataTabs($input['intrackt_vendors_hiddenproductdatatabs']);
        foreach ($optionTable as $option) {
            $option['oldname']=\sanitize_text_field($option['oldname']);
            $option['hide']=(($option['hide']==1)?1:0);
            $option['newname']=\sanitize_text_field($option['newname']);
        }
        $options['hiddenproductdatatabs']=$optionTable;
        
        $optionTable=self::processHiddenProductEditBlocks($input['intrackt_vendors_hiddenproducteditblocks']);
        foreach ($optionTable as $option) {
            $option['oldname']=\sanitize_text_field($option['oldname']);
            $option['hide']=(($option['hide']==1)?1:0);
            $option['newname']=\sanitize_text_field($option['newname']);
            $option['column']=(in_array($option['column'],array('default','center','right'))?$option['column']:'default');
            $option['position']=(\preg_match('/^[0-9]{0,10}$/i',$option['position'])?$option['position']:'');
            $option['help']=\wp_kses($option['help'],\wp_kses_allowed_html('post'));
        }
        $options['hiddenproducteditblocks']=$optionTable;
        
        $optionTable=self::processHiddenArbitraryContent($input['intrackt_vendors_hiddenarbitrarycontent']);
        foreach ($optionTable as $option) {
            $option['tag']=\sanitize_text_field($option['tag']);
            $option['text']=\wp_kses($option['text'],\wp_kses_allowed_html('post'));
            $option['hide']=(($option['hide']==1)?1:0);
            $option['parent']=\sanitize_text_field($option['parent']);
            $option['newtext']=\wp_kses($option['newtext'],\wp_kses_allowed_html('post'));
        }
        $options['hiddenarbitrarycontent']=$optionTable;
        
        $option=\wp_kses($_POST['intrackt_vendors_vendorproducthelp'],\wp_kses_allowed_html('post'));
        $options['vendorproducthelp'] =$option;
        
        $option=\trim($input['intrackt_vendors_productnameprompt']);
        if (\preg_match('/^[a-z0-9!\?\.\(\),:;\'"@#\$%^&\*_ ]*$/i', $option)) {
            $options['productnameprompt'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_productnamerollover']);
        if (\preg_match('/^[a-z0-9!\?\.\(\),:;\'"@#\$%^&\*_ ]*$/i', $option)) {
            $options['productnamerollover'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_productlongdescriptionlabel']);
        if (\preg_match('/^[a-z0-9!\?\.\(\),:;\'"@#\$%^&\*_ ]*$/i', $option)) {
            $options['productlongdescriptionlabel'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_displaysalesprice']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['displaysalesprice'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_skuidmethod']);
        if (in_array($option,array('manual','add','prefix'))) {
            $options['skuidmethod'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_skuconstantnumber']);
        if (\preg_match('/^[0-9]{0,10}$/i', $option)) {
            $options['skuconstantnumber'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_skuconstantprefix']);
        if (\preg_match('/^[-a-z0-9!\?\.\(\),:;\'"@#\$%^&\*_ ]*$/i', $option)) {
            $options['skuconstantprefix'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_hidevirtualproducttype']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['hidevirtualproducttype'] =$option;
        }
        
        $option=\trim($input['intrackt_vendors_hidedownloadableproducttype']);
        if (\preg_match('/^[01]{1,1}$/i', $option)) {
            $options['hidedownloadableproducttype'] =$option;
        }
        
        //$option=\trim($input['intrackt_vendors_simpleboosterproductedit']);
        //if (\preg_match('/^[01]{1,1}$/i', $option)) {
        //    $options['simpleboosterproductedit'] =$option;
        //}
        
        //$option=\trim($input['intrackt_vendors_displayboostersalesprice']);
        //if (\preg_match('/^[01]{1,1}$/i', $option)) {
        //    $options['displayboostersalesprice'] =$option;
        //}
        
        //$option=\trim($input['intrackt_vendors_displayregularprice']);
        //if (\preg_match('/^[01]{1,1}$/i', $option)) {
        //    $options['displayregularprice'] =$option;
        //}
        
        //$option=$_POST['intrackt_vendors_productboosterpriceshelp'];
        //$options['productboosterpriceshelp'] =$option;
        
        //$option=\trim($input['intrackt_vendors_displaygravityformsbutton']);
        //if (\preg_match('/^[01]{1,1}$/i', $option)) {
        //    $options['displaygravityformsbutton'] =$option;
        //}
        
        
       /*
         * update options
         */
        \update_option('intrackt_vendors',$options);

    }

    /*
     * echo select options for all categories and their children
     */
    private static function showCategoryOption($selected,$parent,$spacer) {
        
        /*
         * get arguments for this category
         */
        $args=array(
            'taxonomy'=>'product_cat',
            'hide_empty'=>false,
            'parent'=>$parent
            );
        
        /*
         * get the categories that match
         */
        $categories=get_terms($args);
        //PageLog::updateTestObjectLog('$categories', $categories);
        
        /*
         * loop through them, displaying the selection for this category
         * and call myself for the subcategories
         */
        foreach ($categories as $category) {
            echo "<option value={$category->term_taxonomy_id} ".(($selected==$category->term_taxonomy_id)?'selected ':'').">{$spacer}{$category->name} ({$category->slug})</option>";
            self::showCategoryOption($selected,$category->term_id,$spacer.'&nbsp; ');
        }
        
        return;

    }

    /*
     * Handle display of the client import vendor role
     */
    public static function optionsSimpleVendorForm() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_simplevendorform' name='intrackt_vendors_options[intrackt_vendors_simplevendorform]' style='width: 350px;'>".
                "<option value=1 ".(($options['simplevendorform']==1)?'selected ':'').">Keep Address, Paypal email, Telephone, T&C</option>".
                "<option value=0 ".(($options['simplevendorform']==0)?'selected ':'').">Keep all</option>".
            "</select>";

    }

    /*
     * Handle display of the client import vendor role
     */
    //public static function optionsNewOrderToEmail() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    echo "<select id='intrackt_vendors_newordertoemail' name='intrackt_vendors_options[intrackt_vendors_newordertoemail]' style='width: 350px;'>".
    //            "<option value=0 ".(($options['newordertoemail']==0)?'selected ':'').">Vendor's email address</option>".
    //            "<option value=1 ".(($options['newordertoemail']==1)?'selected ':'').">Store owners email address</option>".
    //        "</select>";

    //}

    /*
     * Handle display of the client import vendor role
     */
    public static function optionsHideOrderVendorName() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_hideordervendorname' name='intrackt_vendors_options[intrackt_vendors_hideordervendorname]' style='width: 350px;'>".
                "<option value=0 ".(($options['hideordervendorname']==0)?'selected ':'').">Show</option>".
                "<option value=1 ".(($options['hideordervendorname']==1)?'selected ':'').">Hide</option>".
            "</select>";

    }

    /*
     * Handle display of the client import vendor role
     */
    public static function optionsHideVendorOffers() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_hidevendoroffers' name='intrackt_vendors_options[intrackt_vendors_hidevendoroffers]' style='width: 350px;'>".
                "<option value=0 ".(($options['hidevendoroffers']==0)?'selected ':'').">Store owner can also manage vendor's offers</option>".
                "<option value=1 ".(($options['hidevendoroffers']==1)?'selected ':'').">Store owner does not see vendor offers</option>".
            "</select>";

    }

    /*
     * process the hidden admin menu item settings
     */
    public static function processHiddenAdminMenus($option) {
        
        $tempArray=array();
        $returnArray=array();
        
        //PageLog::updateTestObjectLog('$option', $option);
        
        /*
         * loop through menu items in the list
         */
        foreach ($option as $menuItem) {
            
            $row=$menuItem['row'];
            
            /*
             * If there is a submit button, skip if the key is not 'add'
             */
            if (array_key_exists('submit',$menuItem)&&($row!='row-add')) continue;
            
            /*
             * if no button and the key is 'add', also skip
             */
            if ((!array_key_exists('submit',$menuItem))&&($row=='row-add')) continue;
            
            /*
             * if hide not present, set to 0
             */
            $hide=array_key_exists('hide',$menuItem)?$menuItem['hide']:0;
            
            /*
             * load temp array
             */
            $tempArray[strtolower($menuItem['oldname'])]=array(
                'oldname'=>$menuItem['oldname'],
                'hide'=>$hide,
                'newname'=>$menuItem['newname'],
                );
                
        }
        
        /*
         * sort on key and create final array
         */
        ksort($tempArray);
        //PageLog::updateTestObjectLog('$tempArray', $tempArray);
        foreach ($tempArray as $menuItem) $returnArray[]=$menuItem;
        //PageLog::updateTestObjectLog('$returnArray', $returnArray);
        
        return $returnArray;
    
    }

    /*
     * Handle display of the hidden admin menu items table of settings
     */
    public static function optionsHiddenAdminMenus() {
    
        /*
         * get the current menu items to be hidden
         */
        $options = \get_option('intrackt_vendors');
        $option=$options['hiddenadminmenus'];
        
        /*
         * start of table
         */
        echo "
            <div style='display: table; margin: 0px!important;'>
            <div style='display: table-row;'>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>Menu Display Name</div>
            <div style='display: table-cell; text-align: center; font-weight: bold; width: 25px!important'>Hide</div>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>New Name</div>
            <div style='display: table-cell;'></div>
            </div>
            ";
        
        /*
         * build table row for each existing menu item to hide
         */
        $i=0;
        foreach ($option as $menuItem) {
            
            /*
             * get values
             */
            $oldname=$menuItem['oldname'];
            $checked=($menuItem['hide']==1)?'checked':'';
            $display=($checked=='')?"inline":"none";
            $newname=$menuItem['newname'];
            
            echo "
                <div style='display: table-row;'>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][{$i}][oldname]'
                    value='{$oldname}'  size='30'></div>
                <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][{$i}][hide]'
                    data-hideadminmenu='hideadminmenu{$i}' value='1' {$checked}></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][{$i}][newname]'
                    id='hideadminmenu{$i}' value='{$newname}' size='30' style='display: {$display};'></div>
                <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][{$i}][submit]'
                    value='Remove from list'>
                    <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][{$i}][row]'
                    value='row-{$i}'></div>
                </div>
                ";
                
            $i++;
            
        }

        /*
         * end of table
         */
        echo "
            <div style='display: table-row;'>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][add][oldname]'
                value=''  size='30'></div>
            <div style='display: table-cell; text-align: center; width: 25 px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][add][hide]'
                data-hideadminmenu='hideadminmenuadd' value='1'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][add][newname]'
                id='hideadminmenuadd' value='' size='30'></div>
            <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][add][submit]'
                value='Add to list'>
                <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenadminmenus][add][row]'
                value='row-add'></div>
            </div>
            </div>
            </div>
            ";
    }

    /*
     * process the hidden product type settings
     */
    public static function processHiddenProductTypes($option) {
        
        $tempArray=array();
        $returnArray=array();
        
        //PageLog::updateTestObjectLog('$option', $option);
        
        /*
         * loop through menu items in the list
         */
        foreach ($option as $menuItem) {
            
            $row=$menuItem['row'];
            
            /*
             * If there is a submit button, skip if the key is not 'add'
             */
            if (array_key_exists('submit',$menuItem)&&($row!='row-add')) continue;
            
            /*
             * if no button and the key is 'add', also skip
             */
            if ((!array_key_exists('submit',$menuItem))&&($row=='row-add')) continue;
            
            /*
             * if hide not present, set to 0
             */
            $hide=array_key_exists('hide',$menuItem)?$menuItem['hide']:0;
            
            /*
             * load temp array
             */
            $tempArray[strtolower($menuItem['oldname'])]=array(
                'oldname'=>$menuItem['oldname'],
                'hide'=>$hide,
                'newname'=>$menuItem['newname'],
                );
                
        }
        
        /*
         * sort on key and create final array
         */
        ksort($tempArray);
        //PageLog::updateTestObjectLog('$tempArray', $tempArray);
        foreach ($tempArray as $menuItem) $returnArray[]=$menuItem;
        //PageLog::updateTestObjectLog('$returnArray', $returnArray);
        
        return $returnArray;
    
    }

    /*
     * Handle display of the hidden product types table of settings
     */
    public static function optionsHiddenProductTypes() {
    
        /*
         * get the current menu items to be hidden
         */
        $options = \get_option('intrackt_vendors');
        $option=$options['hiddenproducttypes'];
        
        /*
         * start of table
         */
        echo "
            <div style='display: table; margin: 0px!important;'>
            <div style='display: table-row;'>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>Product Type</div>
            <div style='display: table-cell; text-align: center; font-weight: bold;; width: 25px!important'>Hide</div>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>New Name</div>
            <div style='display: table-cell;'></div>
            </div>
            ";
        
        /*
         * build table row for each existing menu item to hide
         */
        $i=0;
        foreach ($option as $menuItem) {
            
            /*
             * get values
             */
            $oldname=$menuItem['oldname'];
            $checked=($menuItem['hide']==1)?'checked':'';
            $display=($checked=='')?"inline":"none";
            $newname=$menuItem['newname'];
            
            echo "
                <div style='display: table-row;'>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][{$i}][oldname]'
                    value='{$oldname}'  size='30'></div>
                <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][{$i}][hide]'
                    data-hiddenproducttypes='hiddenproducttypes{$i}' value='1' {$checked}></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][{$i}][newname]'
                    id='hiddenproducttypes{$i}' value='{$newname}' size='30' style='display: {$display};'></div>
                <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][{$i}][submit]'
                    value='Remove from list'>
                    <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][{$i}][row]'
                    value='row-{$i}'></div>
                </div>
                ";
                
            $i++;
            
        }

        /*
         * end of table
         */
        echo "
            <div style='display: table-row;'>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][add][oldname]'
                value=''  size='30'></div>
            <div style='display: table-cell; text-align: center; width: 25 px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][add][hide]'
                data-hiddenproducttypes='hiddenproducttypesadd' value='1'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][add][newname]'
                id='hiddenproducttypesadd' value='' size='30'></div>
            <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][add][submit]'
                value='Add to list'>
                <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproducttypes][add][row]'
                value='row-add'></div>
            </div>
            </div>
            ";
    }

    /*
     * process the hidden product data tabs settings
     */
    public static function processHiddenProductDataTabs($option) {
        
        $tempArray=array();
        $returnArray=array();
        
        //PageLog::updateTestObjectLog('$option', $option);
        
        /*
         * loop through menu items in the list
         */
        foreach ($option as $menuItem) {
            
            $row=$menuItem['row'];
            
            /*
             * If there is a submit button, skip if the key is not 'add'
             */
            if (array_key_exists('submit',$menuItem)&&($row!='row-add')) continue;
            
            /*
             * if no button and the key is 'add', also skip
             */
            if ((!array_key_exists('submit',$menuItem))&&($row=='row-add')) continue;
            
            /*
             * if hide not present, set to 0
             */
            $hide=array_key_exists('hide',$menuItem)?$menuItem['hide']:0;
            
            /*
             * load temp array
             */
            $tempArray[strtolower($menuItem['oldname'])]=array(
                'oldname'=>$menuItem['oldname'],
                'hide'=>$hide,
                'newname'=>$menuItem['newname'],
                );
                
        }
        
        /*
         * sort on key and create final array
         */
        ksort($tempArray);
        //PageLog::updateTestObjectLog('$tempArray', $tempArray);
        foreach ($tempArray as $menuItem) $returnArray[]=$menuItem;
        //PageLog::updateTestObjectLog('$returnArray', $returnArray);
        
        return $returnArray;
    
    }

    /*
     * Handle display of the hidden product data tabs table of settings
     */
    public static function optionsHiddenProductDataTabs() {
    
        /*
         * get the current menu items to be hidden
         */
        $options = \get_option('intrackt_vendors');
        $option=$options['hiddenproductdatatabs'];
        
        /*
         * start of table
         */
        echo "
            <div style='display: table; margin: 0px!important;'>
            <div style='display: table-row;'>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>Product Data Tab</div>
            <div style='display: table-cell; text-align: center; font-weight: bold; width: 25px!important'>Hide</div>
            <div style='display: table-cell; text-align: center; font-weight: bold;'>New Name</div>
            <div style='display: table-cell;'></div>
            </div>
            ";
        
        /*
         * build table row for each existing menu item to hide
         */
        $i=0;
        foreach ($option as $menuItem) {
            
            /*
             * get values
             */
            $oldname=$menuItem['oldname'];
            $checked=($menuItem['hide']==1)?'checked':'';
            $display=($checked=='')?"inline":"none";
            $newname=$menuItem['newname'];
            
            echo "
                <div style='display: table-row;'>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][{$i}][oldname]'
                    value='{$oldname}'  size='30'></div>
                <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][{$i}][hide]'
                    data-hiddenproductdatatabs='hiddenproductdatatabs{$i}' value='1' {$checked}></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][{$i}][newname]'
                    id='hiddenproductdatatabs{$i}' value='{$newname}' size='30' style='display: {$display};'></div>
                <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][{$i}][submit]'
                    value='Remove from list'>
                    <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][{$i}][row]'
                    value='row-{$i}'></div>
                </div>
                ";
                
            $i++;
            
        }

        /*
         * end of table
         */
        echo "
            <div style='display: table-row;'>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][add][oldname]'
                value=''  size='30'></div>
            <div style='display: table-cell; text-align: center; width: 25 px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][add][hide]'
                data-hiddenproductdatatabs='hiddenproductdatatabsadd' value='1'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][add][newname]'
                id='hiddenproductdatatabsadd' value='' size='30'></div>
            <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][add][submit]'
                value='Add to list'>
                <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproductdatatabs][add][row]'
                value='row-add'></div>
            </div>
            </div>
             ";
    }

    /*
     * process the hidden product edit blocks settings
     */
    public static function processHiddenProductEditBlocks($option) {
        
        $tempArray=array();
        $returnArray=array();
        
        //PageLog::updateTestObjectLog('$option', $option);
        
        /*
         * loop through menu items in the list
         */
        foreach ($option as $menuItem) {
            
            $row=$menuItem['row'];
            
            /*
             * If there is a submit button, skip if the key is not 'add'
             */
            if (array_key_exists('submit',$menuItem)&&($row!='row-add')) continue;
            
            /*
             * if no button and the key is 'add', also skip
             */
            if ((!array_key_exists('submit',$menuItem))&&($row=='row-add')) continue;
            
            /*
             * if hide not present, set to 0
             */
            $hide=array_key_exists('hide',$menuItem)?$menuItem['hide']:0;
            
            /*
             * load temp array
             */
            $tempArray[strtolower($menuItem['oldname'])]=array(
                'oldname'=>$menuItem['oldname'],
                'hide'=>$hide,
                'newname'=>$menuItem['newname'],
                'column'=>$menuItem['column'],
                'position'=>$menuItem['position'],
                'help'=>$menuItem['help']
                );
                
        }
        
        /*
         * sort on key and create final array
         */
        ksort($tempArray);
        //PageLog::updateTestObjectLog('$tempArray', $tempArray);
        foreach ($tempArray as $menuItem) $returnArray[]=$menuItem;
        //PageLog::updateTestObjectLog('$returnArray', $returnArray);
        
        return $returnArray;
    
    }

    /*
     * Handle display of the hidden product edit blocks table of settings
     */
    public static function optionsHiddenProductEditBlocks() {
    
        /*
         * get the current menu items to be hidden
         */
        $options = \get_option('intrackt_vendors');
        $option=$options['hiddenproducteditblocks'];
        
        /*
         * start of table
         */
        echo "
            <div style='display: table;'>
            <div style='display: table-row;'>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Product Edit Block (partial match)</div>
            <div style='display: table-cell; font-weight: bold; text-align: center; width: 25px!important'>Hide</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>New Name</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Column</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Position</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Add Help to edit block</div>
            <div style='display: table-cell;'></div>
            </div>
            ";
        
        /*
         * build table row for each existing menu item to hide
         */
        $i=0;
        foreach ($option as $menuItem) {
            
            /*
             * get values
             */
            $oldname=$menuItem['oldname'];
            $checked=($menuItem['hide']==1)?'checked':'';
            $display=($checked=='')?"inline":"none";
            $newname=$menuItem['newname'];
            $help=(array_key_exists('help',$menuItem)?$menuItem['help']:'');
            $column=(array_key_exists('column',$menuItem)?$menuItem['column']:'');
            $position=(array_key_exists('position',$menuItem)?$menuItem['position']:'');
            
            echo "
                <div style='display: table-row;'>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][oldname]'
                    value='{$oldname}'  size='30'></div>
                <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][hide]'
                    data-hiddenproducteditblocks='hiddenproducteditblocks{$i}' value='1' {$checked}></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][newname]'
                    id='hiddenproducteditblocks{$i}newname' value='{$newname}' size='30' style='display: {$display};'></div>
                <div style='display: table-cell;'><select name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][column]'
                    id='hiddenproducteditblocks{$i}column' style='display: {$display};'>
                        <option value='default' ".(($column=='default')?'selected':'').">Default</option>
                        <option value='center' ".(($column=='center')?'selected':'').">Center</option>
                        <option value='right' ".(($column=='right')?'selected':'').">Right</option>
                    </select></div>
                <div style='display: table-cell;'><input type='number' min='0' step='1' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][position]'
                    id='hiddenproducteditblocks{$i}position' value='{$position}' size='30' style='display: {$display};'></div>
                <div style='display: table-cell; width: 100%;'><input type='text' style='width: 100%; display: {$display};' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][help]'
                    id='hiddenproducteditblocks{$i}help' value='{$help}'></div>
                <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][submit]'
                    value='Remove from list'>
                    <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][{$i}][row]'
                    value='row-{$i}'></div>
                </div>
                ";
                
            $i++;
            
        }

        /*
         * end of table
         */
        echo "
            <div style='display: table-row;'>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][oldname]'
                value=''  size='30'></div>
            <div style='display: table-cell; text-align: center; width: 25 px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][hide]'
                data-hiddenproducteditblocks='hiddenproducteditblocksadd' value='1'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][newname]'
                id='hiddenproducteditblocksaddnewname' value='' size='30'></div>
            <div style='display: table-cell;'><select name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][column]'
                id='hiddenproducteditblocksaddcolumn' style='display: inline;'>
                    <option value='default' selected>Default</option>
                    <option value='center'>Center</option>
                    <option value='right'>Right</option>
                </select></div>
            <div style='display: table-cell;'><input type='number' min='1' step='1' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][position]'
                id='hiddenproducteditblocksaddposition' value='1' size='30' style='display: inline;'></div>
            <div style='display: table-cell; width: 100%;'><input type='text' style='width: 100%;' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][help]'
                id='hiddenproducteditblocksaddhelp' value=''></div>
            <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][submit]'
                value='Add to list'>
                <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenproducteditblocks][add][row]'
                value='row-add'></div>
            </div>
            </div>
            ";
    }

    /*
     * process table to hide arbitrary content
     */
    public static function processHiddenArbitraryContent($option) {
        
        $tempArray=array();
        $returnArray=array();
        
        /*
         * loop through menu items in the list
         */
        foreach ($option as $menuItem) {
            
            $row=$menuItem['row'];
            
            //PageLog::updateTestObjectLog("processHiddenArbitraryContent: \$row='{$row}', \$menuItem", $menuItem);
        
            /*
             * If there is a submit button, skip if the key is not 'add'
             */
            if (array_key_exists('submit',$menuItem)&&($row!='row-add')) continue;
            
            //PageLog::updateTestLog("Here A");
            
            /*
             * if no button and the key is 'add', also skip
             */
            if ((!array_key_exists('submit',$menuItem))&&($row=='row-add')) continue;
            
            //PageLog::updateTestLog("Here B");
            
            /*
             * if hide not present, set to 0
             */
            $hide=array_key_exists('hide',$menuItem)?$menuItem['hide']:0;
            
            /*
             * load temp array
             */
            $tempArray[strtolower($menuItem['text'])]=array(
                'tag'=>$menuItem['tag'],
                'text'=>$menuItem['text'],
                'hide'=>$hide,
                'parent'=>$menuItem['parent'],
                'newtext'=>$menuItem['newtext']
                );
                
        }
        
        /*
         * sort on key and create final array
         */
        ksort($tempArray);
        //PageLog::updateTestObjectLog('$tempArray', $tempArray);
        foreach ($tempArray as $menuItem) $returnArray[]=$menuItem;
        //PageLog::updateTestObjectLog('$returnArray', $returnArray);
        
        //PageLog::updateTestObjectLog('processHiddenArbitraryContent: $returnArray', $returnArray);
        return $returnArray;
    
    }

    /*
     * Handle display of the hidden arbitrary content table of settings
     */
    public static function optionsHiddenArbitraryContent() {
    
        /*
         * get the current menu items to be hidden
         */
        $options = \get_option('intrackt_vendors');
        $option=$options['hiddenarbitrarycontent'];
        
        /*
         * start of table
         */
        echo "
            <div style='display: table;'>
            <div style='display: table-row;'>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Tag Holding Text</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Text</div>
            <div style='display: table-cell; text-align: center; font-weight: bold; width: 25px!important'>Hide</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Tag to Hide</div>
            <div style='display: table-cell; font-weight: bold; text-align: center;'>Replacement Text</div>
            <div style='display: table-cell;'></div>
            </div>
            ";
        
        /*
         * build table row for each existingitem to hide
         */
        $i=0;
        foreach ($option as $menuItem) {
            
            /*
             * get values
             */
            $tag=$menuItem['tag'];
            $text=$menuItem['text'];
            $parent=$menuItem['parent'];
            $newText=$menuItem['newtext'];
            $checked=(($menuItem['hide']==1)?'checked':'');
            $newTextDisplay=($checked=='')?"inline":"none";
            $parentDisplay=($checked=='')?"none":"inline";
            
            echo "
                <div style='display: table-row;'>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][tag]'
                    value='{$tag}' size='10'></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][text]'
                    value='{$text}' size='30'></div>
                <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][hide]'
                    data-hiddenarbitrarycontent='hiddenarbitrarycontent{$i}' value='1' {$checked}></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][parent]'
                    id='hiddenarbitrarycontent{$i}parent' value='{$parent}' size='10' style='display: {$parentDisplay};'></div>
                <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][newtext]'
                    id='hiddenarbitrarycontent{$i}newtext' value='{$newText}' size='30' style='display: {$newTextDisplay};'></div>
                <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][submit]'
                    value='Remove from list'>
                    <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][row]'
                    value='row-{$i}'></div>
                </div>
                ";
                
            $i++;
            
        }

        /*
         * end of table
         */
        echo "
            <div style='display: table-row;'>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][tag]'
                value=''  size='10'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][text]'
                value='' size='30'></div>
            <div style='display: table-cell; text-align: center; width: 25px!important'><input type='checkbox' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][{$i}][hide]'
                data-hiddenarbitrarycontent='hiddenarbitrarycontentadd' value='1'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][parent]'
                id='hiddenarbitrarycontentaddparent' value='' size='10' style='display: none;'></div>
            <div style='display: table-cell;'><input type='text' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][newtext]'
                id='hiddenarbitrarycontentaddnewtext' value='' size='30' style='display: inline;'></div>
            <div style='display: table-cell;'><input type='submit' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][submit]'
                value='Add to list'>
                <input type='hidden' name='intrackt_vendors_options[intrackt_vendors_hiddenarbitrarycontent][add][row]'
                value='row-add'></div>
            </div>
            </div>
            ";
    }

    /*
     * Handle vendor simple product edit flag
     */
    public static function optionsSimplevendorproductedit() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_simplevendorproductedit' name='intrackt_vendors_options[intrackt_vendors_simplevendorproductedit]' style='width: 70px;'>".
                "<option value=1 ".(($options['simplevendorproductedit']==1)?'selected ':'').">Yes</option>".
                "<option value=0 ".(($options['simplevendorproductedit']==0)?'selected ':'').">No</option>".
            "</select>";

    }

    /*
     * Handle vendor simple product edit flag
     */
    public static function optionsTemplateProductId() {
        
        global $wpdb;
        
        /*
         * is there a vendor master product
         */
        $productIds=$wpdb->get_col($wpdb->prepare("
            SELECT ID
            FROM {$wpdb->prefix}posts
            WHERE post_name=%s
                AND post_type='product'
                AND post_status!='trash'
            ",'vendor-master-product'));
        $productId=(count($productIds)==0)?0:$productIds[0];
    
        /*
         * Show create template product if there isn't one
         */
        if ($productId==0) {
            echo "<a href='/wp-admin/post-new.php?post_type=product&vendormasterproduct=yes'>
                <button id='intrackt_vendors_templateproductid' type='button'>
                Add Vendor Master Product and set all product default values
                </button></a>";
        } else {
            echo "<a href='/wp-admin/post.php?post={$productId}&action=edit&vendormasterproduct=yes'>
                <button id='intrackt_vendors_templateproductid' type='button'>
                Edit Vendor Master Product and update all product default values
                </button></a>";
        }

    }

    /*
     * Handle vendor simple booster product edit flag
     */
    //public static function optionsSimpleboosterproductedit() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    echo "<select id='intrackt_vendors_simpleboosterproductedit' name='intrackt_vendors_options[intrackt_vendors_simpleboosterproductedit]' style='width: 70px;'>".
    //            "<option value=1 ".(($options['simpleboosterproductedit']==1)?'selected ':'').">Yes</option>".
    //            "<option value=0 ".(($options['simpleboosterproductedit']==0)?'selected ':'').">No</option>".
    //        "</select>";

    //}

    /*
     * Handle vendor enter multi-currency sales price flag
     */
    //public static function optionsDisplayBoosterSalesPrice() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    echo "<select id='intrackt_vendors_displayboostersalesprice' name='intrackt_vendors_options[intrackt_vendors_displayboostersalesprice]' style='width: 70px;'>".
    //            "<option value=1 ".(($options['displayboostersalesprice']==1)?'selected ':'').">Yes</option>".
    //            "<option value=0 ".(($options['displayboostersalesprice']==0)?'selected ':'').">No</option>".
    //        "</select>";

    //}

    /*
     * Handle vendor enter regular price flag
     */
    //public static function optionsDisplayRegularPrice() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    echo "<select id='intrackt_vendors_displayregularprice' name='intrackt_vendors_options[intrackt_vendors_displayregularprice]' style='width: 70px;'>".
    //            "<option value=1 ".(($options['displayregularprice']==1)?'selected ':'').">Yes</option>".
    //            "<option value=0 ".(($options['displayregularprice']==0)?'selected ':'').">No</option>".
    //        "</select>";

    //}

    /*
     * Handle vendor display sales price flag
     */
    public static function optionsDisplaySalesPrice() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_displaysalesprice' name='intrackt_vendors_options[intrackt_vendors_displaysalesprice]' style='width: 70px;'>".
                "<option value=1 ".(($options['displaysalesprice']==1)?'selected ':'').">Yes</option>".
                "<option value=0 ".(($options['displaysalesprice']==0)?'selected ':'').">No</option>".
            "</select>";

    }

    /*
     * Handle vendor specification of SKU ID method
     */
    public static function optionsSkuIdMethod() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_skuidmethod' name='intrackt_vendors_options[intrackt_vendors_skuidmethod]' style='width: 400px;'>".
                "<option value='manual' ".(($options['skuidmethod']=='manual')?'selected ':'').">Entered manually</option>".
                "<option value='add' ".(($options['skuidmethod']=='add')?'selected ':'').">Add product Id to a constant number</option>".
                "<option value='prefix' ".(($options['skuidmethod']=='prefix')?'selected ':'').">Prefix product ID with a constant number or text</option>".
            "</select>";

    }

    /*
     * Handle vendor specification of SKU ID base constant number
     */
    public static function optionsSkuConstantNumber() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_skuconstantnumber' name='intrackt_vendors_options[intrackt_vendors_skuconstantnumber]' size='100' type='number' placeholder='Enter a number' value='{$options['skuconstantnumber']}' />";    

    }

    /*
     * Handle vendor specification of SKU ID constant prefix2
     */
    public static function optionsSkuConstantPrefix() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_skuconstantprefix' name='intrackt_vendors_options[intrackt_vendors_skuconstantprefix]' size='30' type='text' value='{$options['skuconstantprefix']}' />";    

    }

    /*
     * Handle hide virtual product type
     */
    public static function optionsHideVirtualProductType() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_hidevirtualproducttype' name='intrackt_vendors_options[intrackt_vendors_hidevirtualproducttype]' style='width: 70px;'>".
                "<option value=1 ".(($options['hidevirtualproducttype']==1)?'selected ':'').">Yes</option>".
                "<option value=0 ".(($options['hidevirtualproducttype']==0)?'selected ':'').">No</option>".
            "</select>";

    }

    /*
     * Handle hide downloadable product type
     */
    public static function optionsHideDownloadableProductType() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<select id='intrackt_vendors_hidedownloadableproducttype' name='intrackt_vendors_options[intrackt_vendors_hidedownloadableproducttype]' style='width: 70px;'>".
                "<option value=1 ".(($options['hidedownloadableproducttype']==1)?'selected ':'').">Yes</option>".
                "<option value=0 ".(($options['hidedownloadableproducttype']==0)?'selected ':'').">No</option>".
            "</select>";

    }

    /*
     * Handle display vendor product edit help
     */
    public static function optionsVendorProductHelp() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        \wp_editor(\stripslashes($options['vendorproducthelp']),'intrackt_vendors_vendorproducthelp',$settings = array('textarea_rows'=>'10', 'editor_class'=>'intrackt_wider_css') );

    }

    /*
     * Handle display vendor product edit help
     */
    //public static function optionsProductBoosterPricesHelp() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    \wp_editor(\stripslashes($options['productboosterpriceshelp']),'intrackt_vendors_productboosterpriceshelp',$settings = array('textarea_rows'=>'3', 'editor_class'=>'intrackt_wider_css') );

    //}

    /*
     * Handle display of the dashboard consign link
     */
    public static function optionsDashboardConsignPrompt() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_dashboardconsignprompt' name='intrackt_vendors_options[intrackt_vendors_dashboardconsignprompt]' size='70' type='text' value='{$options['dashboardconsignprompt']}' />";    

    }

    /*
     * Handle display of the dashboard consign link
     */
    public static function optionsDashboardManagePrompt() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_dashboardmanageprompt' name='intrackt_vendors_options[intrackt_vendors_dashboardmanageprompt]' size='70' type='text' value='{$options['dashboardmanageprompt']}' />";    

    }

    /*
     * Handle display of the product name prompt
     */
    public static function optionsProductNamePrompt() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_productnameprompt' name='intrackt_vendors_options[intrackt_vendors_productnameprompt]' size='100' type='text' value='{$options['productnameprompt']}' />";    

    }

    /*
     * Handle display of the product name rollover text
     */
    public static function optionsProductNameRollover() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_productnamerollover' name='intrackt_vendors_options[intrackt_vendors_productnamerollover]' size='100' type='text' value='{$options['productnamerollover']}' />";    

    }

    /*
     * Handle display of the product long description label
     */
    public static function optionsProductLongDescriptionLabel() {
    
        /*
         * create the input widget
         */
        $options = \get_option('intrackt_vendors');
        echo "<input id='intrackt_vendors_productlongdescriptionlabel' name='intrackt_vendors_options[intrackt_vendors_productlongdescriptionlabel]' size='100' type='text' value='{$options['productlongdescriptionlabel']}' />";    

    }

    /*
     * Handle vendor simple gravity forms selection
     */
    //public static function optionsDisplayGravityFormsButton() {
    
        /*
         * create the input widget
         */
    //    $options = \get_option('intrackt_vendors');
    //    echo "<select id='intrackt_vendors_displaygravityformsbutton' name='intrackt_vendors_options[intrackt_vendors_displaygravityformsbutton]' style='width: 70px;'>".
    //            "<option value=1 ".(($options['displaygravityformsbutton']==1)?'selected ':'').">Yes</option>".
    //            "<option value=0 ".(($options['displaygravityformsbutton']==0)?'selected ':'').">No</option>".
    //        "</select>";

    //}

    /*
     * Define Options
     */
    public static function optionsDefine() {        
      
        /*
         * get options and set this one to the default if not set
         */
        $options = \get_option('intrackt_vendors');
        if (!is_array($options)) $options=array();
        if (!array_key_exists('simplevendorform',$options)) {
            $options['simplevendorform']='0';
        }
        if (!array_key_exists('dashboardconsignprompt',$options)) {
            $options['dashboardconsignprompt']='Click HERE to Consign your books with store owner';
        }
        if (!array_key_exists('dashboardmanageprompt',$options)) {
            $options['dashboardmanageprompt']='Click HERE to manage your consigned books';
        }
        //if (!array_key_exists('newordertoemail',$options)) {
        //    $options['newordertoemail']='0';
        //}
        if (!array_key_exists('hideordervendorname',$options)) {
            $options['hideordervendorname']='0';
        }
        if (!array_key_exists('hidevendoroffers',$options)) {
            $options['hidevendoroffers']='0';
        }
        if (!array_key_exists('hiddenadminmenus',$options)) {
            $options['hiddenadminmenus']=array();
        }
        if (!array_key_exists('hiddenproducttypes',$options)) {
            $options['hiddenproducttypes']=array();
        }
        if (!array_key_exists('hiddenproductdatatabs',$options)) {
            $options['hiddenproductdatatabs']=array();
        }
        if (!array_key_exists('hiddenproducteditblocks',$options)) {
            $options['hiddenproducteditblocks']=array();
        }
        if (!array_key_exists('hiddenarbitrarycontent',$options)) {
            $options['hiddenarbitrarycontent']=array();
        }
        if (!array_key_exists('simplevendorproductedit',$options)) {
            $options['simplevendorproductedit']='0';
        }
        if (!array_key_exists('templateproductid',$options)) {
            $options['templateproductid']='0';
        }
        if (!array_key_exists('vendorproducthelp',$options)) {
            $options['vendorproducthelp']='';
        }
        if (!array_key_exists('productnameprompt',$options)) {
            $options['productnameprompt']='';
        }
        if (!array_key_exists('productnamerollover',$options)) {
            $options['productnamerollover']='';
        }
        if (!array_key_exists('productlongdescriptionlabel',$options)) {
            $options['productlongdescriptionlabel']='';
        }
        if (!array_key_exists('displaysalesprice',$options)) {
            $options['displaysalesprice']='1';
        }
        if (!array_key_exists('skuidmethod',$options)) {
            $options['skuidmethod']='manual';
        }
        if (!array_key_exists('skuconstantnumber',$options)) {
            $options['skuconstantnumber']='10000000';
        }
        if (!array_key_exists('skuconstantprefix',$options)) {
            $options['skuconstantprefix']='vendor-';
        }
        if (!array_key_exists('hidevirtualproducttype',$options)) {
            $options['hidevirtualproducttype']='0';
        }
        if (!array_key_exists('hidedownloadableproducttype',$options)) {
            $options['hidedownloadableproducttype']='0';
        }
        //if (!array_key_exists('simpleboosterproductedit',$options)) {
        //    $options['simpleboosterproductedit']='0';
        //}

        //if (!array_key_exists('displayboostersalesprice',$options)) {
        //    $options['displayboostersalesprice']='1';
        //}

        //if (!array_key_exists('displayregularprice',$options)) {
        //    $options['displayregularprice']='1';
        //}
        //if (!array_key_exists('productboosterpriceshelp',$options)) {
        //    $options['productboosterpriceshelp']='';
        //}
        
        //if (!array_key_exists('displaygravityformsbutton',$options)) {
        //    $options['displaygravityformsbutton']='1';
        //}
        
        \update_option('intrackt_vendors',$options);
        
        /*
         * automated SKU ID generation requires a separate option field
         */
        /*
         * get options and set this one to the default if not set
         */
        $nextSkuId = \get_option('intrackt_vendors_next_sku_id');
        if ($nextSkuId=='') {
            update_option('intrackt_vendors_next_sku_id',31400000);
        }

        /*
         * Define the options form fields
         */
        \register_setting( 'intrackt_vendors_options', 'intrackt_vendors_options', array( 'Intrackt\Vendors\PageMain', 'optionsValidate' ) );
        
        /*
         * "PAGE" 1
         */
        \add_settings_section('intrackt_vendors_p01s01', '', array( 'Intrackt\Vendors\PageMain', 'page01Section01Text' ), 'intrackt_vendors_p01');
        \add_settings_field('intrackt_vendors_simplevendorform', '<span style="white-space:nowrap">Simplify vendor sign up form for registered customers:<br>(Does not affect vendor signup on the registration page if enabled.)</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSimpleVendorForm' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        \add_settings_field('intrackt_vendors_dashboardconsignprompt', '<span style="white-space:nowrap">Dashboard consign link text:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDashboardConsignPrompt' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        \add_settings_field('intrackt_vendors_dashboardmanageprompt', '<span style="white-space:nowrap">Dashboard manage link text:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDashboardManagePrompt' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        //\add_settings_field('intrackt_vendors_newordertoemail', '<span style="white-space:nowrap">Send order emails to:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsNewOrderToEmail' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        \add_settings_field('intrackt_vendors_hideordervendorname', '<span style="white-space:nowrap">Vendor name on order lines:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsHideOrderVendorName' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        \add_settings_field('intrackt_vendors_hidevendoroffers', '<span style="white-space:nowrap">Store Owner and Managing Vendor Offers:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsHideVendorOffers' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        \add_settings_field('intrackt_vendors_simplevendorproductedit', '<span style="white-space:nowrap">Enable Vendor Product Add/Edit options:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSimplevendorproductedit' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s01');
        
        \add_settings_section('intrackt_vendors_p01s02', '', array( 'Intrackt\Vendors\PageMain', 'page01Section02Text' ), 'intrackt_vendors_p01');
        \add_settings_field('intrackt_vendors_hiddenadminmenus', '', array( 'Intrackt\Vendors\PageMain', 'optionsHiddenAdminMenus' ), 'intrackt_vendors_p01', 'intrackt_vendors_p01s02',array('class'=>'intrackt_options_table'));
        
        /*
         * "PAGE" 2
         */
        \add_settings_section('intrackt_vendors_p02s01', '', array( 'Intrackt\Vendors\PageMain', 'page02Section01Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_templateproductid', '<span style="white-space:nowrap">Optional product default values template:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsTemplateProductId' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_vendorproducthelp', '<span style="white-space:nowrap">Product help text at top of form</span>', array( 'Intrackt\Vendors\PageMain', 'optionsVendorProductHelp' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_productnameprompt', '<span style="white-space:nowrap">Product name prompt text:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsProductNamePrompt' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_productnamerollover', '<span style="white-space:nowrap">Product name rollover text:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsProductNameRollover' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_productlongdescriptionlabel', '<span style="white-space:nowrap">Product long description name:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsProductLongDescriptionLabel' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_displaysalesprice', '<span style="white-space:nowrap">Vendor can enter sales price:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDisplaySalesPrice' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_skuidmethod', '<span style="white-space:nowrap">How is SKU ID specified:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSkuIdMethod' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_skuconstantnumber', '<span style="white-space:nowrap">SKU ID is product ID + :</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSkuConstantNumber' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');
        \add_settings_field('intrackt_vendors_skuconstantprefix', '<span style="white-space:nowrap">SKU ID is product ID with this prefix:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSkuConstantPrefix' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s01');

        \add_settings_section('intrackt_vendors_p02s02', '', array( 'Intrackt\Vendors\PageMain', 'page02Section02Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_hiddenproducttypes', '', array( 'Intrackt\Vendors\PageMain', 'optionsHiddenProductTypes' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s02',array('class'=>'intrackt_options_table'));
        
        \add_settings_section('intrackt_vendors_p02s03', '', array( 'Intrackt\Vendors\PageMain', 'page02Section03Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_hidevirtualproducttype', '<span style="white-space:nowrap">Hide virtual product type:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsHideVirtualProductType' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s03');
        \add_settings_field('intrackt_vendors_hidedownloadableproducttype', '<span style="white-space:nowrap">Hide downloadable product type:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsHideDownloadableProductType' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s03');
        
        \add_settings_section('intrackt_vendors_p02s04', '', array( 'Intrackt\Vendors\PageMain', 'page02Section04Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_hiddenproductdatatabs', '', array( 'Intrackt\Vendors\PageMain', 'optionsHiddenProductDataTabs' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s04',array('class'=>'intrackt_options_table'));
        
        \add_settings_section('intrackt_vendors_p02s05', '', array( 'Intrackt\Vendors\PageMain', 'page02Section05Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_hiddenproducteditblocks', '', array( 'Intrackt\Vendors\PageMain', 'optionsHiddenProductEditBlocks' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s05',array('class'=>'intrackt_options_table'));
        
        \add_settings_section('intrackt_vendors_p02s06', '', array( 'Intrackt\Vendors\PageMain', 'page02Section06Text' ), 'intrackt_vendors_p02');
        \add_settings_field('intrackt_vendors_hiddenarbitrarycontent', '', array( 'Intrackt\Vendors\PageMain', 'optionsHiddenArbitraryContent' ), 'intrackt_vendors_p02', 'intrackt_vendors_p02s06',array('class'=>'intrackt_options_table'));
        
        /*
         * "PAGE" 3
         */
        //\add_settings_section('intrackt_vendors_p03s01', '', array( 'Intrackt\Vendors\PageMain', 'page03Section01Text' ), 'intrackt_vendors_p03');
        //\add_settings_field('intrackt_vendors_simpleboosterproductedit', '<span style="white-space:nowrap">Simplify multi-currency fields:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsSimpleboosterproductedit' ), 'intrackt_vendors_p03', 'intrackt_vendors_p03s01');
        //\add_settings_field('intrackt_vendors_displayboostersalesprice', '<span style="white-space:nowrap">Vendor can enter booster sales prices:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDisplayBoosterSalesPrice' ), 'intrackt_vendors_p03', 'intrackt_vendors_p03s01');
        //\add_settings_field('intrackt_vendors_displayregularprice', '<span style="white-space:nowrap">Vendor can enter regular price:<br>(if "No", US regular price is used.):</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDisplayRegularPrice' ), 'intrackt_vendors_p03', 'intrackt_vendors_p03s01');
        //\add_settings_field('intrackt_vendors_productboosterpriceshelp', '<span style="white-space:nowrap">Instructions for entering prices</span>', array( 'Intrackt\Vendors\PageMain', 'optionsProductBoosterPricesHelp' ), 'intrackt_vendors_p03', 'intrackt_vendors_p03s01');

        /*
         * "PAGE" 5
         */
        //\add_settings_section('intrackt_vendors_p05s01', '', array( 'Intrackt\Vendors\PageMain', 'page05Section01Text' ), 'intrackt_vendors_p05');
        //\add_settings_field('intrackt_vendors_displaygravityformsbutton', '<span style="white-space:nowrap">Vendor can use Gravity Forms:</span>', array( 'Intrackt\Vendors\PageMain', 'optionsDisplayGravityFormsButton' ), 'intrackt_vendors_p05', 'intrackt_vendors_p05s01');

    }

    /*
     * Process page
     */
    public static function processPage() {
        
        //PageLog::updateTestLog("PageMain::processPage: start");

        /*
         * If doing full reset
         */
        if (array_key_exists('FullReset',$_POST)) {
            
            /*
             * clear the log
             */
            PageLog::resetLog();
            
            PageLog::updateLog("PageMain::processPage: Starting to do full reset");

        }
        
    }

    /*
     * Display the page
     */
    public static function displayPage() {
        
        //global $activeTab;
        
        //PageLog::updateTestLog("PageMain::displayPage: '{$activeTab}'");
        
        ?>

        <div class="wrap">
        <h2 style="display: none">       <h2>
        <h1>Intrackt Vendors Settings and Options</h1>

        <!--
         Options form
        -->
        <style>
            .intrackt_wider_css {width: 100%!important;}
        </style>
        <form action="options.php" method="post" id="intrackt_options_form">
            <?php
            
            /*
             * This plugin adjusts settings for other plugins.
             * Determine which of these plugins are active and set style to hide settings for those that aren't
             */
            //{
            //    $showOffer=\is_plugin_active('offers-for-woocommerce/offers-for-woocommerce.php')?"":" display: none;";

            //    $showGravity=\is_plugin_active('gravityforms/gravityforms.php')?"":" display: none;";

            //    $showBooster=" display: none;";
            //    if (\is_plugin_active('woocommerce-jetpack/woocommerce-jetpack.php'))
            //        if (get_option('wcj_multicurrency_enabled','no')=='yes') 
            //            $showBooster="";
                
                //$showGravity=' display: none;';
            //}
            
            /*
             * show tabs
             */
            ?>
            <input id="intrackt_activetab" name="intrackt_activetab" type="hidden" value="intrackt_tab_1">
            <button type='button' id="intrackt_tab_1" data-intrackt_settings_tab="intrackt_controls" data-addeditok="0" style="background-color: lightgreen; display: inline;">Controls</button>
            <button type='button' id="intrackt_tab_2" data-intrackt_settings_tab="intrackt_menu" data-addeditok="0" style="background-color: lightgreen; display: inline;">Vendor Admin Menu</button>
            Vendor Product Add/Edit:
            <button type='button' id="intrackt_tab_3" data-intrackt_settings_tab="intrackt_productgeneral" data-addeditok="1" style="background-color: lightgreen; display: inline;">General</button>
            <button type='button' id="intrackt_tab_4" data-intrackt_settings_tab="intrackt_producttypes" data-addeditok="1" style="background-color: lightgreen; display: inline;">Product Types</button>
            <button type='button' id="intrackt_tab_5" data-intrackt_settings_tab="intrackt_producttabs" data-addeditok="1" style="background-color: lightgreen; display: inline;">Data Tabs</button>
            <button type='button' id="intrackt_tab_6" data-intrackt_settings_tab="intrackt_productblocks" data-addeditok="1" style="background-color: lightgreen; display: inline;">Edit Blocks</button>
            <button type='button' id="intrackt_tab_7" data-intrackt_settings_tab="intrackt_productother" data-addeditok="1" style="background-color: lightgreen; display: inline;">Other Content</button>
            <?php

            /*
             * Define and display settings
             */
            \settings_fields('intrackt_vendors_options');
            \do_settings_sections('intrackt_vendors_p01');
            
            \do_settings_sections('intrackt_vendors_p02');
            
            \do_settings_sections('intrackt_vendors_p03');

            \do_settings_sections('intrackt_vendors_p05');
            
            ?>
            </div>
            <p> </p>
            <input name="Submit" type="submit" value="<?esc_attr_e('Save All Settings and Options Changes','Intrackt'); ?>" />
        </form>
        
        <style>
            table.form-table th {
                padding-right: 40px!important;
            }
            .intrackt_options_table th{
                display: none;
            }
            #page02Section02Text .form-table tbody tr th{
                display: none;
            }
            #page02Section04Text .form-table tbody tr th{
                display: none;
            }
            #page02Section05Text .form-table tbody tr th{
                display: none;
            }
            #page02Section06Text .form-table tbody tr th{
                display: none;
            }
        </style>
        <script>
            /*
             * control all vendor options form client-side logic
             */
            document.addEventListener("DOMContentLoaded", processVendorsOptionsForm);
            function processVendorsOptionsForm() {
                
                /*
                 * find all checkboxes that control hiding admin menu items
                 */
                allCheckboxes=document.querySelectorAll('[data-hideadminmenu]');
                for (i=0;i<allCheckboxes.length;i++) {
                    allCheckboxes[i].addEventListener('change',showHideMenuNewName);
                }
                
                /*
                 * find all checkboxes that control hiding product types
                 */
                allCheckboxes=document.querySelectorAll('[data-hiddenproducttypes]');
                for (i=0;i<allCheckboxes.length;i++) {
                    allCheckboxes[i].addEventListener('change',showHiddenProductType);
                }
                
                /*
                 * find all checkboxes that control hiding product data tabs
                 */
                allCheckboxes=document.querySelectorAll('[data-hiddenproductdatatabs]');
                for (i=0;i<allCheckboxes.length;i++) {
                    allCheckboxes[i].addEventListener('change',showHiddenProductDataTabs);
                }
                
                /*
                 * find all checkboxes that control hiding product edit blocks
                 */
                allCheckboxes=document.querySelectorAll('[data-hiddenproducteditblocks]');
                for (i=0;i<allCheckboxes.length;i++) {
                    allCheckboxes[i].addEventListener('change',showHiddenProductEditBlocks);
                }
                
                /*
                 * find all checkboxes that control hiding arbitrary product edit content
                 */
                allCheckboxes=document.querySelectorAll('[data-hiddenarbitrarycontent]');
                for (i=0;i<allCheckboxes.length;i++) {
                    allCheckboxes[i].addEventListener('change',showHiddenArbitraryContent);
                }
                
                /*
                 * add a change listener to the sku ID method, and also do immediately
                 */
                controlSkuIdMethod();
                document.getElementById('intrackt_vendors_skuidmethod').addEventListener('change',controlSkuIdMethod);
                
                /*
                 * show and hide instructions for arbitrary content
                 */
                document.getElementById('page02Section06TextShowInstructionsButton').addEventListener('click',function(){
                    document.getElementById('page02Section06TextShowInstructions').style.display='none';
                    document.getElementById('page02Section06TextHideInstructions').style.display='inline';
                });
                document.getElementById('page02Section06TextHideInstructionsButton').addEventListener('click',function(){
                    document.getElementById('page02Section06TextHideInstructions').style.display='none';
                    document.getElementById('page02Section06TextShowInstructions').style.display='inline';
                });
                
                /*
                 * add eent listener to all settings tabs
                 */
                openTab=sessionStorage.getItem('intrackt_opentab');
                if (openTab!==null) {
                    document.getElementById('intrackt_activetab').value=openTab;
                }
                settingTabs=document.querySelectorAll('[data-intrackt_settings_tab]');
                for (i=0;i<settingTabs.length;i++) {
                    //console.log("got button "+i);
                    settingTabs[i].addEventListener('click',intracktTabClicked);
                }
                intracktActivateTab();
                document.getElementById('intrackt_vendors_simplevendorproductedit').addEventListener('change',intracktActivateTab);
                
                /*
                 * handle unload with changes made
                 */
                {
                    /*
                     * the form
                     */
                    myForm=document.getElementById('intrackt_options_form');
                    
                    /*
                     * intercept submits so that they do not count
                     */
                    myForm.addEventListener('submit',settingsSubmitted);
                    
                    /*
                     * intercept all changes
                     */
                    formElements=myForm.elements;
                    for (i=0;i<formElements.length;i++)
                        formElements[i].addEventListener('change',handleChanges);
                    
                    /*
                     * the unload handler itself
                     */
                    window.addEventListener("beforeunload",handleUnload);
                }
                
            }
            
            /*
             * tab clicked
             */
            function intracktTabClicked(e) {
                me=e.target;
                tabId=me.id;
                //console.log(tabId+' was clicked');
                rememberTabId=document.getElementById('intrackt_activetab');
                rememberTabId.value=tabId;
                sessionStorage.setItem('intrackt_opentab',tabId);
                intracktActivateTab();
            }
            
            /*
             * activate tab
             */
             function intracktActivateTab() {
             
                /*
                 * get id of tab clicked
                 */
                rememberTabId=document.getElementById('intrackt_activetab');
                tabId=rememberTabId.value;
                me=document.getElementById(tabId);
                
                //console.log(tabId+' start');
                /*
                 * grey out all tabs and hide all panels
                 */
                settingTabs=document.querySelectorAll('[data-intrackt_settings_tab]');
                addEditFlag=document.getElementById('intrackt_vendors_simplevendorproductedit').value;
                for (i=0;i<settingTabs.length;i++) {
                    if ((addEditFlag=='1')||(settingTabs[i].getAttribute('data-addeditok')=='0'))
                        settingTabs[i].style.backgroundColor='lightgreen';
                    else
                        settingTabs[i].style.backgroundColor='#ffcccb';
                    panelId=settingTabs[i].getAttribute('data-intrackt_settings_tab');
                    document.getElementById(panelId).style.display='none';
                }
                
                /*
                 * show/hide product options warning
                 */
                warningMsgs=document.getElementsByClassName('intrackt_noproductaddedit');
                for (i=0;i<warningMsgs.length;i++) {
                    if (addEditFlag=='1')
                        warningMsgs[i].style.display='none';
                    else
                        warningMsgs[i].style.display='inline';
                }
                
                /*
                 * whiten active tab and display its panel
                 */
                me.style.backgroundColor='white';
                //console.log(me);
                panelId=me.getAttribute('data-intrackt_settings_tab');
                document.getElementById(panelId).style.display='inline';

             }
            
            /*
             * control display of associated sku ID fields
             */
            function controlSkuIdMethod() {
                /*
                 * get my value and my targets
                 */                ;
                myValue=document.getElementById('intrackt_vendors_skuidmethod').value;
                constantNumber=document.getElementById('intrackt_vendors_skuconstantnumber').closest('tr');
                constantPrefix=document.getElementById('intrackt_vendors_skuconstantprefix').closest('tr');
                
                /*
                 * hide/show based on sku method
                 */
                if (myValue=='manual') {
                    constantNumber.style.display='none';
                    constantPrefix.style.display='none';
                } else if (myValue=='add') {
                    constantNumber.style.display='';
                    constantPrefix.style.display='none';
                } else {
                    constantNumber.style.display='none';
                    constantPrefix.style.display='';
                }
                
            }
            
            /*
             * show or hide the menu item's new name if hide is or is not checked
             */
            function showHideMenuNewName(e) {
                
                /*
                 * get me and my target
                 */
                me=e.target;
                other=document.getElementById(me.getAttribute('data-hideadminmenu'));
                
                /*
                 * set display of other based on if I am checked
                 */
                other.style.display=me.checked?'none':'inline';

            }
            
            /*
             * show or hide the product type's new name if hide is or is not checked
             */
            function showHiddenProductType(e) {
                
                /*
                 * get me and my target
                 */
                me=e.target;
                other=document.getElementById(me.getAttribute('data-hiddenproducttypes'));
                
                /*
                 * set display of other based on if I am checked
                 */
                other.style.display=me.checked?'none':'inline';

            }
            
            /*
             * show or hide the product data tab's new name if hide is or is not checked
             */
            function showHiddenProductDataTabs(e) {
                
                /*
                 * get me and my target
                 */
                me=e.target;
                other=document.getElementById(me.getAttribute('data-hiddenproductdatatabs'));
                
                /*
                 * set display of other based on if I am checked
                 */
                other.style.display=me.checked?'none':'inline';

            }
            
            /*
             * show or hide the product edit block's new name if hide is or is not checked
             */
            function showHiddenProductEditBlocks(e) {
                
                /*
                 * get me and my target
                 */
                me=e.target;
                otherNewtext=document.getElementById(me.getAttribute('data-hiddenproducteditblocks')+'newname');
                otherColumn=document.getElementById(me.getAttribute('data-hiddenproducteditblocks')+'column');
                otherPosition=document.getElementById(me.getAttribute('data-hiddenproducteditblocks')+'position');
                otherHelp=document.getElementById(me.getAttribute('data-hiddenproducteditblocks')+'help');
                
                /*
                 * set display of other based on if I am checked
                 */
                otherNewtext.style.display=me.checked?'none':'inline';
                otherColumn.style.display=me.checked?'none':'inline';
                otherPosition.style.display=me.checked?'none':'inline';
                otherHelp.style.display=me.checked?'none':'inline';

            }
            
            /*
             * show or hide arbitrary product contents new name and parent tag if hide is or is not checked
             */
            function showHiddenArbitraryContent(e) {
                
                /*
                 * get me and my target
                 */
                me=e.target;
                parentObject=document.getElementById(me.getAttribute('data-hiddenarbitrarycontent')+'parent');
                newTextObject=document.getElementById(me.getAttribute('data-hiddenarbitrarycontent')+'newtext');
                
                /*
                 * set display of other based on if I am checked
                 */
                parentObject.style.display=me.checked?'inline':'none';
                newTextObject.style.display=me.checked?'none':'inline';

            }
            
            /*
             * intercept submit event
             */
            var formSubmitted=false;
            function settingsSubmitted(e) {
                formSubmitted=true;
            }
            
            /*
             * intercept all changes
             */
            var formChanges=false;
            function handleChanges(e) {
                formChanges=true;
            }
            
            /*
             * Handle unload of page
             */
            function handleUnload(e) {
                
                /*
                 * if form being submitted, skip unload message
                 */
                if (formSubmitted) return undefined;
                
                /*
                 * if no changes
                 */
                if (!formChanges) return undefined;
                
                /*
                 * we need to warn the user
                 */
                returnMsg="You have made changes to your settings.  Are you sure you want to abandon those changes?";
                (e||window.event).returnValue=returnMsg;
                return returnMsg;
            }
            
        </script>
        </div>
        <?php
    }    
    
 }

/*
 * If not during gathering the code
 */
//PageLog::updateTestLog("PageMain executed");
     
/*
 * Process any forms on this page
 */
if (isset($_POST['action'])) {
    if ($_POST['action']=="PageMainProcessPage") {
       PageMain::processPage();
    }
}
