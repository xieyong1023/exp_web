<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>
<div class="h20 w990"></div>
<div class="product inside fn-c w990 h-auto" id="main">
	<div class="product_sidebar h-auto fd-l">
        <?php $this->load->view($config['site_template'].'/sidebar_honor');?>
        <?php $this->load->view($config['site_template'].'/sidebar_news');?>
        <?php $this->load->view($config['site_template'].'/sidebar_contact');?>
	</div>
	<div class="product_main  bg-fff h-auto fd-r">
		<div class="inside_title">
			<h3><?php echo lang('link')?></h3>
			<p>当前位置：<a href="<?php echo base_url($langurl);?>"><?php echo lang('home')?></a> > <?php echo lang('link')?></p>
		</div>
        <div class="inside_main h-auto">
        	

            <br />
            <script language="javascript">
             function checklnk()
			 {
				if(document.getElementById('url').value==''||document.getElementById('url').value=='http://') 
				{
				 alert('请输入网址');	
				 document.getElementById('url').focus();
				 return false;
				}
				
				if(document.getElementById('title').value=='') 
				{
				 alert('请输入网站名称');	
				 document.getElementById('title').focus();
				 return false;
				}
			 }
            </script>
            <form name="formlist" id="formlist" action="<?=site_url($tablefunc.'/add')?>" method="post" onsubmit="return checklnk()">
            <input type="hidden" name="action" id="action" value="<?=site_url($tablefunc)?>">
            <input type="hidden" name="type" id="type" value="1">
            <table cellspacing="1" cellpadding="3" width="100%" border="0" style="height: 300px;" id="tbForm">
                <tbody>
                  <tr>
                    <td align="center" height="30">
                        <font color="red">*</font>网&nbsp;&nbsp;&nbsp;&nbsp; 址：
                    </td>
                    <td>
                        <input name="url" type="text" id="url" class="ipt-txt" size="30" value="http://" maxlength="200">
                    </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        <font color="red">*</font>网站名称：
                    </td>
                    <td>
                        <input name="title" type="text" id="title" class="ipt-txt" size="30" maxlength="50">
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        链接类型：
                    </td>
                    <td>
                        <select id="linktype" name="linktype">
                            <option value="1" selected="true">文字链接</option>
                            <option value="2">图片链接</option>
                      </select>
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        网站Logo：
                    </td>
                    <td>
                        <input name="thumb" type="text" id="thumb" class="ipt-txt" size="30" maxlength="200">
                        (110*40 gif或jpg或png)
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        网站简况：
                    </td>
                    <td>
                        <textarea name="remark" id="remark" class="ipt-txt" rows="4" cols="40" max="400"></textarea>
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        联系人姓名：
                    </td>
                    <td>
                        <input name="username" type="text" id="username" class="ipt-txt" size="30" maxlength="50">
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        联系电话：
                    </td>
                    <td>
                        <input name="tel" type="text" id="tel" class="ipt-txt" size="30" maxlength="50">
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        站长Email：
                    </td>
                    <td>
                        <input name="email" type="text" id="email" class="ipt-txt" size="30" maxlength="200">
                  </td>
                </tr>
                <tr>
                    <td align="center" height="30">
                        联系QQ：
                    </td>
                    <td>
                        <input class="ipt-txt" id="qq" name="qq" type="text" size="30" maxlength="20">
                  </td>
                </tr>
                <tr>
                    <td height="30">&nbsp;
                        
                    </td>
                    <td>
                        <input type="submit" style="width: 50px" value="保 存" >
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" style="width: 50px" value="重 填">
                  </td>
                </tr>
            </tbody></table>
            </form>
            
            
      </div>
	</div>
</div>
<div class="h40 w990"></div>
<?php $this->load->view($config['site_template'].'/foot');?>