<?php $this->load->view('platform/head');?>


<body style="text-align: left;color:#000;font-size:14px;">
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/test.js';?>"></script>
<script type="text/javascript">


</script>
<?php 
$a = array('a', 'b', 'c');
print_r($a);
unset($a[0]);
print_r($a);
?>
</html>