<?php
define ( "SINGLE_TEMPLATE_DIR", "single-templates" );
class Disney_Category_Template {
	function __construct() {
		add_action ( 'category_add_form_fields', array (
				$this,
				'add_templates_field'
		) );
		add_action ( 'category_edit_form_fields', array (
				$this,
				'edit_templates_field'
		) );
		add_action ( 'create_category', array (
				$this,
				'save_tax_meta'
		), 10, 2 );
		add_action ( 'edited_category', array (
				$this,
				'save_tax_meta'
		), 10, 2 );
		add_action ( 'delete_category', array (
				$this,
				'remove_tax_meta'
		), 10, 2 );
		add_filter ( 'category_template', array (
				$this,
				'get_custom_category_type_template'
		) );
	}
	function add_templates_field($term = null) {
		?>
<div class="form-field term-templates-wrap">
  <label for="templates"><?php _e("Templates","disney");?></label>
	  <?php $this->the_template_select();?>
	  </select>
</div>
<?php
	}
	function edit_templates_field($term) {
		?>
<tr class="form-field">
  <th scope="row"><label for="templates"><?php _e("Templates","disney");?></label>

  <td>
			<?php $this->the_template_select($term);?>
	    </td>
  </th>
</tr>
<?php
	}
	function the_template_select($term = null) {
		?>
<select name="templates" id="templates" class="postform">
  <option value=""><?php _e("Select templates", "disney")?></option>
			    <?php
		$directory = get_template_directory () . '/' . SINGLE_TEMPLATE_DIR . '/';
		$scanned_directory = array_diff ( scandir ( $directory ), array (
				'..',
				'.',
				'.svn',
				'.git'
		) );
		$selected_template = '';

		if ($term != null && ! empty ( $term )) {
			$term_id = $term->term_id;
			$selected_template = get_option ( "category_$term_id" );
		}

		foreach ( $scanned_directory as $template_filename ) :
			$start = stripos ( $template_filename, '-' );
			$end = stripos ( $template_filename, '.' );
			$template_name = substr ( $template_filename, $start + 1, $end - $start - 1 );
			?>
			      <option class="level-0" value="<?php echo $template_filename?>" <?php if ($selected_template == $template_filename) echo "selected = 'selected'"?>><?php echo $template_name?></option>
			    <?php endforeach;?>
			  </select>
<?php
	}
	function save_tax_meta($term_id) {
		if (isset ( $_POST ['templates'] )) {
			$term_meta = $_POST ['templates'];
			update_option ( "category_$term_id", $term_meta );
		}
	}
	function remove_tax_meta($term_id) {
		if ($option = get_option ( "category_$term_id" )) {
			delete_option ( "category_$term_id" );
		}
	}
	function get_custom_category_type_template($template) {
		$cat_id = "";

		if (is_category()) {
			$cat_id = get_query_var('cat');
		} else {
			$category_array = get_the_category ();

			if ($category = $category_array[0]) {
				$cat_id = $category->term_id;
			}
		}
		$option_name = "category_" .$cat_id ;

		if ($termplate_name = get_option ( $option_name )) {
			$template = dirname(__FILE__).'\\..\\'.SINGLE_TEMPLATE_DIR.'\\' . $termplate_name;
		}


		return $template;
	}
}
new Disney_Category_Template ();