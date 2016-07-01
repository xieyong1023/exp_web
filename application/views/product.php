<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head">
		<form name="formsearch" id="formsearch" action="<?=site_aurl($tablefunc)?>" method="post">
			<table class="menu">
				<tr>
					<td>
						<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
						<span><?=lang('filter')?></span>
						<input type="text" name="keyword" value="<?=$search['keyword']?>" class="input-text">
						<select name="searchtype">
							<option value="title" <?php if ($search['searchtype'] == 'title'): ?>selected<?php endif; ?>><?=lang('title')?></option>
							<option value="id" <?php if ($search['searchtype'] == 'id'): ?>selected<?php endif; ?>><?=lang('id')?></option>
						</select>
						<select name="category">
							<option value="0"><?=lang('category_pselect')?></option>
							<?php foreach($categoryarr as $category):?>
							<option value="<?=$category['id']?>"<?php if ($search['category']==$category['id']): ?>selected<?php endif; ?>><?=$category['name']?></option>
							<?php endforeach;?>
						</select>
						<select name="recommend">
							<option value="0"><?=lang('recommend')?></option>
							<?php foreach($recommendarr as $recommend):?>
							<option value="<?=$recommend['id']?>"<?php if ($search['recommend']==$recommend['id']): ?>selected<?php endif; ?>><?=$recommend['title']?></option>
							<?php endforeach;?>
						</select>
						<input type="submit" class="btn" value="<?=lang('search')?>">
					</td>
				</tr>
			</table>
		</form>
		<table cellSpacing=0 width="100%" class="content_list">
			<thead>
				<tr>
					<th width=30  align="left"><input type="checkbox" onclick="checkAll(this)"></th>
					<th width=50  align="left"><?=lang('order')?></th>
					<th width=40  align="left"><?=lang('id')?></th>
					<th align=left><?=lang('title')?></th>
					<th width=80  align=left><?=lang('category')?></th>
					<th width=80   align="left"><?=lang('hits')?></th>
					<th width=80   align="left"><?=lang('realhits')?></th>
					<th width=50 align="left"><?=lang('status')?></th>
					<th width=50  align="left"><?=lang('operate')?></th>
				</tr>
			</thead>
		</table>
	</div>
	
	<form name="formlist" id="formlist" action="<?=site_aurl($tablefunc)?>" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<div id="main" class="main">
			<table cellSpacing=0 width="100%" class="content_list">
				<tbody id="content_list"><?php if (isset($liststr)): ?><?=$liststr?><?php endif; ?></tbody>
			</table>
		</div>
	</form>
	
	<div class="main_foot">
		<table>
			<tr>
				<td>
					<div class="func"><?php if (isset($funcstr)): ?><?=$funcstr?><?php endif; ?></div>
				</td>
				<td align="right">
					<div class="page"><?php if (isset($pagestr)): ?><?=$pagestr?><?php endif; ?></div>
				</td>
			</tr>
		</table>
	</div>
	
	<?php $this->load->view('admin_foot.php');?>
<?php elseif($tpl=='view'):?>

	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view">
			<table cellSpacing=0 width="100%" class="content_view">
				<tr>
					<td><?=lang('category_pselect')?></td>
					<td colspan="4">
						<select name="category" id="category" class="validate" validtip="required" onchange="chzc(this.value)">
							<?php foreach($categoryarr as $category):?>
							<option value="<?=$category['id']?>"<?php if (isset($view['category'])&&$view['category']==$category['id']): ?>selected<?php endif; ?>><?=$category['name']?></option>
							<?php endforeach;?>
						</select></td>
					<!--
					<td><?=lang('price')?></td>
					<td colspan="2"><input type="text" name="price" id="price" class="input-text"  value="<?=isset($view['price'])?$view['price']:'';?>"></td>
					-->
					<td rowspan="4" class="upic">
						<img src="<?=isset($view['thumb'])&&$view['thumb']!=''?get_image_url($view['thumb']):get_image_url('data/nopic8080.gif')?>" onclick="uploadpic(this,'thumb')" width="150" id="imgthumb"><input type="hidden" name="thumb" id="thumb" value="<?=isset($view['thumb'])?$view['thumb']:'';?>"><br><input type="button" class="btn" onclick="unsetThumb('thumb','imgthumb')" value="<?=lang('unsetpic')?>">	
					</td>
				</tr>
				<tr>
					<td><?=lang('title')?></td>
					<td colspan="4"><input type="text" name="title" id="title" size="60" style="color:<?=isset($view['color'])?$view['color']:'';?>" class="validate input-text" validtip="required"  value="<?=isset($view['title'])?$view['title']:'';?>">
						<a  class="selectcolor colorpicker" onclick="colorpicker(this,'color','title')">&nbsp;</a>
						<input type="hidden" name="color" id="color"  value="<?=isset($view['color'])?$view['color']:'';?>">
						<input type="checkbox" id="isbold" name="isbold" <?=isset($view['isbold'])&&$view['isbold']==1?'checked':'';?> value="1"><?=lang('isbold')?>
					</td>
				</tr>
       			<tr>
					<td><?=lang('alt')?></td>
					<td colspan="4"><input type="text" name="alt" id="alt" class="input-text" size="60"  value="<?=isset($view['alt'])?$view['alt']:'';?>"></td></tr>
				<tr>
					<td><?=lang('keywords')?></td>
					<td colspan="4"><input type="text" name="keywords" id="keywords" class="input-text" size="60"  value="<?=isset($view['keywords'])?$view['keywords']:'';?>"></td></tr>
				<tr>
					<td><?=lang('description')?></td>
					<td colspan="4"><textarea rows="5" cols="80" class="txtarea" name="description" id="description"><?=isset($view['description'])?$view['description']:'';?></textarea></td></tr>
		        <tr style="display: none">
         		   <td><?=lang('filepath')?></td>
           		   <td colspan="4">
               	   	   <input type="hidden" name="filepath" id="filepath" value="<?php echo $view['filepath']?>" />
             	   	   <script type="text/javascript" src="<?php echo base_url()?>js/plupload/js/plupload.full.min.js"></script>

                	   <table cellSpacing=0>
                   		   <tr>
              					  <?php if($view['filepath']!=''):
                  				    		$files=explode(",",$view['filepath']);
                  					  		$i=1;
                   							foreach($files as $val):
                       							 if($val!=''):
                          		  ?>
                            	<td>
                               		<div style="margin:5px;text-align:center;" id="file_<?php echo $i?>">
                                    	<a href="<?php echo base_url()?>/data/attachment/<?php echo $val?>" target="_blank"><img src="<?php echo base_url()?>/data/attachment/<?php echo $val?>" height="50"> </a>
                                 		<div>
                                 			<a href="javascript::" onclick="if(confirm('确定要删除此文件吗?')){deletefile('<?php echo $val?>','file_<?php echo $i?>')}">删除</a>
                                 		</div>
                               		 </div>
                          		</td>
                            	<?php if($i % 6==0):?>
                            </tr>
                            
                            <tr><?php endif;?>
                            	<?php $i++;endif;endforeach;endif;?>
                   			</tr>
                		</table>
                <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>

                <div id="container" style="background-color: #efefef">
                    &nbsp;<a id="pickfiles" href="javascript:;">[<?=lang('selectfile')?>]</a>&nbsp;&nbsp;
                    &nbsp;<a id="uploadfiles" href="javascript:;">[<?=lang('uploadfile')?>]</a>
                </div>
                <pre id="console"></pre>


                <script>
                    var uploader = new plupload.Uploader({
                        runtimes : 'html5,flash,silverlight,html4',
                        browse_button : 'pickfiles', // you can pass in id...
                        container: document.getElementById('container'), // ... or DOM Element itself
                        url : '<?php echo base_url()?>js/plupload/upload.php',
                        flash_swf_url : '<?php echo base_url()?>js/plupload/js/Moxie.swf',
                        silverlight_xap_url : '<?php echo base_url()?>js/plupload/js/Moxie.xap',
                        unique_names: true,

                        filters : {
                            max_file_size : '10mb',
                            mime_types: [
                                {title : "Image files", extensions : "jpg,gif,png"},
                                {title : "Zip files", extensions : "zip"}
                            ]
                        },


                        init: {
                            PostInit: function() {
                                document.getElementById('filelist').innerHTML = '';

                                document.getElementById('uploadfiles').onclick = function() {
                                    uploader.start();
                                    return false;
                                };
                            },

                            FilesAdded: function(up, files) {
                                plupload.each(files, function(file) {
                                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '"><span  style="width:150px; height:60px;">' + file.name + '(' + plupload.formatSize(file.size) + ') </span> <b></b></div>';
                                });
                            },

                            UploadProgress: function(up, file) {
                                var arrfile=(file.name).split(".");
                                var filename=file.id+"."+arrfile[1];

                                //console.log(file);
                                document.getElementById(file.id).getElementsByTagName('span')[0].innerHTML ='<img src="<?php echo base_url()?>data/attachment/'+filename+'" height="50px">';
                                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + '%</span>&nbsp;&nbsp;<a href="javascript::" onclick="deletefile(\''+filename+'\',\''+file.id+'\')">删除</a>';

                            },

                            FileUploaded: function(up, file) {
                                //console.log(file);
                                 arrfile=(file.name).split(".");
                                 filename=file.id+"."+arrfile[1];
                                $("#filepath").val($("#filepath").val()+filename+",");
                            },

                            Error: function(up, err) {
                                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                            }
                        }
                    });

                    uploader.init();

                    function deletefile(name,k)
                    {
                        $.post("<?php echo base_url()?>js/plupload/delete.php",{op: "delete",name: name},function(result){
                            alert("File Deleted");
                            $("#"+k).remove();
                            var attachment=$("#filepath").val();
                            $("#filepath").val(attachment.replace(name,""));
                        });
                    }
			 </script>
			</td>
		</tr>
        <tr>
			<td><?=lang('content')?></td>
			<td colspan="5">
				<textarea style="width:668px;height:300px;" name="content" id="content" class="editor"><?=isset($view['content'])?htmlspecialchars($view['content']):'';?></textarea>
			</td>
		</tr>
        <tr style="display: none">
            <td><?=lang('spxq')?></td>
            <td colspan="5">
            <textarea style="width:668px;height:300px;" name="spxq" id="spxq" class="editor"><?=isset($view['spxq'])?htmlspecialchars($view['spxq']):'';?></textarea>
            </td>
        </tr>
        <tr style="display: none">
            <td><?=lang('gztx')?></td>
            <td colspan="5">
            	<textarea style="width:668px;height:300px;" name="gztx" id="gztx" class="editor"><?=isset($view['gztx'])?htmlspecialchars($view['gztx']):'';?></textarea>
            </td>
        </tr>
        <tr style="display: none">
            <td><?=lang('xgjscs')?></td>
            <td colspan="5">
            	<textarea style="width:668px;height:300px;" name="xgjscs" id="xgjscs" class="editor"><?=isset($view['xgjscs'])?htmlspecialchars($view['xgjscs']):'';?></textarea>
            </td>
        </tr>
        <tr style="display: none">
            <td><?=lang('czsm')?></td>
            <td colspan="5">
            	<textarea style="width:668px;height:300px;" name="czsm" id="czsm" class="editor"><?=isset($view['czsm'])?htmlspecialchars($view['czsm']):'';?></textarea>
            </td>
        </tr>
        <tr style="display: none">
            <td><?=lang('lxwm')?></td>
            <td colspan="5">
            	<textarea style="width:668px;height:300px;" name="lxwm" id="lxwm" class="editor"><?=isset($view['lxwm'])?htmlspecialchars($view['lxwm']):'';?></textarea>
            </td>
        </tr>
        <tr>
			<td><?=lang('tag')?></td>
			<td colspan="5">
				<input type="text" name="tags" id="tags" size="80" class="input-text" value="<?=isset($tags)?$tags:'';?>"><?=lang('tagtip')?>
			</td>
		</tr>
		<tr>
			<td><?=lang('recommend')?></td>
			<td colspan="5">
				<?php foreach($recommendarr as $recommend):?>
				<?=$recommend['title']?><input type="checkbox" name="recommends[]" <?php if(in_array($recommend['id'],$recommends)):?>checked<?php endif;?> value="<?=$recommend['id']?>">
				<?php endforeach;?>
			</td>
		</tr>
		<tr>
			<td><?=lang('hits')?></td>
			<td>
				<input type="text" name="hits" id="hits"  class="input-text" value="<?=isset($view['hits'])?$view['hits']:0?>">
			</td>
			<td><?=lang('puttime')?></td>
			<td>
				<input type="text" name="puttime" id="puttime" readOnly onClick="WdatePicker({doubleCalendar:true,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="input-text Wdate" value="<?=isset($view['puttime'])?date('Y-m-d H:i:s',$view['puttime']):date('Y-m-d H:i:s')?>">
			</td>
			<td><?=lang('tpl')?></td>
			<td>
				<input type="text" name="tpl" id="tpl" class="input-text" value="<?=isset($view['tpl'])?$view['tpl']:'';?>">
			</td>
		</tr>
		<tr>
			<td><?=lang('order')?></td>
			<td>
				<input type="text" name="listorder" id="listorder" value="<?php if(isset($view['listorder'])){echo $view['listorder'];}else{echo '999';} ?>" class="input-text">
			</td>
			<td><?=lang('status')?></td>
			<td colspan="3">
				<?=lang('status1')?>
				<input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> />
				<?=lang('status0')?>
				<input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?>  />
			</td>
		</tr>
		</table>
	</div>
	</form>
<?php endif;?>