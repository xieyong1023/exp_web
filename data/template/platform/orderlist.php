<?php 
					$a = '';
					foreach ($hitsList as $value){
						$a .= '<div class="cell" style="padding: 5px 10px">
					<table width="100%">
						<tbody>
							<tr>
								<td align="center" width="32" valian="middle">
									<a href="'.site_url('member/p/'.$value['username']).'">
										<img class="small" src="'.$config['site_templateurl'].$value['avatar'].'"/>
									</a>
								</td>
								<td width="10"></td>
								<td width="auto" valian="middle">
									<a href="'.site_url('article/'.$value['id']).'">
										<span class="big">'.$value['title'].'</span>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					</div>';
					}
					echo $a;
					unset($a);
					?>