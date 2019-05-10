<?php
	foreach ($foreign_tbl as $foreignkey => $value) {

		// print_r($foreignkey);
				// echo '<pre>';	
				foreach ($value as $key => $x) {
				$c = count($x);
				$count_no = count($x);
				// print_r($c);
				// print_r($value);
					$first_names = array_column($foreign_tbl, $key);
					// print_r($first_names);
					if (is_array($x)) {
						// print_r($x);
						if (!empty($x['checkbox']) && is_array($x['checkbox'])) {
							$xx = implode('|_|', $x['checkbox']);
							$value[$key]=$xx;
							// print_r($xx);
							// unset($value[$key]);
						}
						else{

					// print_r($value);
					$items = array();
					for ($count = 0; $count < $c; $count++) {
						if (is_array($value)) {
						$res =array_column($value, $count);
						}
						$a = array_keys($value);
						$b = array_combine($a,$res);

						$out = array('primary_id' => $tablename);
					$value1 = array_merge($b, $out);
					$arr2 = array('primary_data_id' => $primary_data_id);
					$value1 = array_merge($value1, $arr2);
					// $value1 = array_merge($value1, $xx);
					$items[] = $value1;
				
							} // for loop
							
						} // else part

					} // is_array ends
					// print_r($value);die;
					$ins = array('primary_id' => $tablename);
					$out = array_merge($value, $ins);
					$ins1 = array('primary_data_id' => $primary_data_id);
					$out = array_merge($out, $ins1);

					$items[] = $out;

					
				} // value
				$no = $idd[0];
				// print_r($items);die;
				for ($i=0; $i < $c; $i++) { 				
				 $f_tname = $this->post_model->get_table_name_by_id($foreignkey);
				 $this->post_model->update_form($f_tname,$items[$i], $no);
				
				}
	
			}
?>