<?php defined('SYSPATH') or die('No direct script access.');

class form extends Kohana_Form {
	
	/**
	 * Creates a form input. If no type is specified, a "text" type input will
	 * be returned.
	 *
	 *     echo Form::input('username', $username);
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 * @uses    HTML::attributes
	 */
	public static function admin_input($name, $value = NULL, array $attributes = NULL)
	{
		// Set the input name
		$attributes['name'] = $name;
		
		// Set the input value
		$attributes['value'] = $value;

		if ( ! isset($attributes['type']))
		{
			// Default type is text
			$attributes['type'] = 'text';
		}
		
		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($name);
		}else{
			$label = $attributes['label'];
		}
		
		$attributes['label'] = null;
		
		return '<dl>						
            		<dt>'.Form::label($name, $label.":").'</dt>
            		<dd>'.Form::input($name, $value, $attributes).'</dd>
        		</dl>';
	}
	
	/**
	 * Creates a select form input.
	 *
	 *     echo Form::select('country', $countries, $country);
	 *
	 * [!!] Support for multiple selected options was added in v3.0.7.
	 *
	 * @param   string   input name
	 * @param   array    available options
	 * @param   mixed    selected option string, or an array of selected options
	 * @param   array    html attributes
	 * @return  string
	 * @uses    HTML::attributes
	 */
	public static function admin_select($name, array $options = NULL, $selected = NULL, array $attributes = NULL)
	{
		// Set the input name
		$attributes['name'] = $name;

		if (is_array($selected))
		{
			// This is a multi-select, god save us!
			$attributes['multiple'] = 'multiple';
		}

		if ( ! is_array($selected))
		{
			if ($selected === NULL)
			{
				// Use an empty array
				$selected = array();
			}
			else
			{
				// Convert the selected options to an array
				$selected = array( (string) $selected);
			}
		}

		if (empty($options))
		{
			// There are no options
			$options = '';
		}
		else
		{
			foreach ($options as $value => $name)
			{
				if (is_array($name))
				{
					// Create a new optgroup
					$group = array('label' => $value);

					// Create a new list of options
					$_options = array();

					foreach ($name as $_value => $_name)
					{
						// Force value to be string
						$_value = (string) $_value;

						// Create a new attribute set for this option
						$option = array('value' => $_value);

						if (in_array($_value, $selected))
						{
							// This option is selected
							$option['selected'] = 'selected';
						}

						// Change the option to the HTML string
						$_options[] = '<option'.HTML::attributes($option).'>'.HTML::chars($_name, FALSE).'</option>';
					}

					// Compile the options into a string
					$_options = "\n".implode("\n", $_options)."\n";

					$options[$value] = '<optgroup'.HTML::attributes($group).'>'.$_options.'</optgroup>';
				}
				else
				{
					// Force value to be string
					$value = (string) $value;

					// Create a new attribute set for this option
					$option = array('value' => $value);

					if (in_array($value, $selected))
					{
						// This option is selected
						$option['selected'] = 'selected';
					}

					// Change the option to the HTML string
					$options[$value] = '<option'.HTML::attributes($option).'>'.HTML::chars($name, FALSE).'</option>';
				}
			}

			// Compile the options into a single string
			$options = "\n".implode("\n", $options)."\n";
		}
				
		
		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($attributes['name']);
		}else{
			$label = $attributes['label'];
		}
		
		$attributes['label'] = null;
		
		
		return '<dl>
            		<dt>'.Form::label($attributes['name'], $label.":").'</dt>
            		<dd>
						<select'.HTML::attributes($attributes).'>'.$options.'</select>
            		</dd>
        		</dl>';
	}
	
	/**
	 * Creates a checkbox form input.
	 *
	 *     echo Form::checkbox('remember_me', 1, (bool) $remember);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function admin_checkbox($name, $value = NULL, $checked = FALSE, array $attributes = NULL, $title = "")
	{
		$attributes['type'] = 'checkbox';

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attributes['checked'] = 'checked';
		}

		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($name);
		}else{
			$label = $attributes['label'];
		}
		
		$attributes['label'] = null;
		
		//return Form::input($name, $value, $attributes);
		return '<dl>
            		<dt>'.Form::label("title_".$name, $title).'</dt>
            		<dd>'
						.Form::input($name, $value, $attributes)
						.Form::label($name, $label, array("class"=>"check_label")).
					'</dd>
        		</dl>';

	}
	
	/**
	 * Creates a radio form input.
	 *
	 *     echo Form::radio('like_cats', 1, $cats);
	 *     echo Form::radio('like_cats', 0, ! $cats);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function admin_radio($name, $value = NULL, $checked = FALSE, array $attributes = NULL, $title = "")
	{
		$attributes['type'] = 'radio';

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attributes['checked'] = 'checked';
		}

		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($name);
		}else{
			$label = $attributes['label'];
		}
		
		$attributes['label'] = null;
		
		//return Form::input($name, $value, $attributes);
		return '<dl>
            		<dt>'.Form::label("title_".$name, $title).'</dt>
            		<dd>'
						.Form::input($name, $value, $attributes)
						.Form::label($name, $label, array("class"=>"check_label")).
					'</dd>
        		</dl>';

	}
	
	/**
	 * Creates a file upload form input. No input value can be specified.
	 *
	 *     echo Form::file('image');
	 *
	 * @param   string  input name
	 * @param   array   html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function admin_file($name, array $attributes = NULL)
	{
		
		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($name);
		}else{
			$label = $attributes['label'];
		}

		return '
		<dl>
            <dt>'.Form::label($name, $label).'</dt>
            <dd>'
				 .Form::file($name).'
			</dd>
        </dl>';
	}
	
	/**
	 * Creates a textarea form input.
	 *
	 *     echo Form::textarea('about', $about);
	 *
	 * @param   string   textarea name
	 * @param   string   textarea body
	 * @param   array    html attributes
	 * @param   boolean  encode existing HTML characters
	 * @return  string
	 * @uses    HTML::attributes
	 * @uses    HTML::chars
	 */
	public static function admin_textarea($name, $body = '', array $attributes = NULL, $double_encode = TRUE)
	{
		// Set the input name
		$attributes['name'] = $name;
		
		if ( ! isset($attributes['label']))
		{
			// Default
			$label = ucfirst($name);
		}else{
			$label = $attributes['label'];
		}

		// Add default rows and cols attributes (required)
		$attributes += array('rows' => 10, 'cols' => 50);
		
		return '<dl>
            <dt>'.Form::label($name, $label).'</dt>
            <dd>'
				 .Form::textarea($name, $body, $attributes, $double_encode).
			'</dd>
        </dl>';

	}	
	
	/**
	 * Creates a submit form input.
	 *
	 *     echo Form::submit(NULL, 'Login');
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function admin_submit($name, $value, array $attributes = NULL)
	{
		$attributes['type'] = 'submit';
		
		return '<dl class="submit">'
					.Form::submit($name, $value, $attributes).
         		'</dl>';

	}
}