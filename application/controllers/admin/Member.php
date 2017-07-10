<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use \Core\AdminController;

class Member extends AdminController
{
    var $tablefunc = 'member';
    var $fields    = array('id',
                           'username',
                           'password',
                           'salt',
                           'studentID',
                           'email',
                           'realname',
                           'tel',
                           'signature',
                           'department',
                           'createtime',
                           'lasttime',
                           'regip',
                           'lastip',
                           'logincount',
                           'logined',
                           'school',
                           'college');
    var $funcarr   = array('multi_add', 'add', 'del');
    var $editlang, $langurl;

    function __construct()
    {
        parent::__construct();
        $this->Lang_model->loadLang('admin');
        $this->load->helper('array');
        $this->load->helper('date');
        $this->load->model('Purview_model');
        $this->Data_model->setTable($this->tablefunc);
        $this->editlang = $this->Lang_model->getEditLang();
        $this->langurl = $this->Lang_model->loadLangUrl($this->editlang);
    }

    public function index()
    {
        $this->Purview_model->checkPurview($this->tablefunc);
        $post = $this->input->post(null, true);
        $getwhere = array();
        $search['keyword'] = trim($post['keyword']);
        $search['searchtype'] = trim($post['searchtype']);
        if ($search['keyword'] != '') {
            $getwhere[$search['searchtype']] = $search['keyword'];
        }
        $pagearr = array(
            'currentpage' => isset($post['currentpage']) && $post['currentpage'] > 0 ? $post['currentpage'] : 1,
            'totalnum'    => $this->Data_model->getDataNum($getwhere),
            'pagenum'     => 20,
        );
        $data = $this->Data_model->getData($getwhere,
                                           '',
                                           $pagearr['pagenum'],
                                           ($pagearr['currentpage'] - 1) * $pagearr['pagenum']);
        $res = array(
            'tpl'       => 'list',
            'tablefunc' => $this->tablefunc,
            'search'    => $search,
            'liststr'   => $this->_setlist($data, true),
            'pagestr'   => show_page($pagearr, $search),
            'funcstr'   => $this->Purview_model->getFunc($this->tablefunc, $this->funcarr),
        );
        $this->load->view($this->tablefunc, $res);
    }

    /**
     * 批量添加用户
     * @author: xieyong <xieyong1023@qq.com>
     * @date: 2017/07/09
     */
    public function multi_add()
    {
        $post = $this->input->post(null, true);

        if(isset($post['action'])){
            $file = $_FILES['file'];
            if(empty($file) || $file['size'] === 0 || $file['error'] != UPLOAD_ERR_OK) {
                show_jsonmsg(['status' => -1, 'remsg' => '上传文件为空']);
            }

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION );
            if($ext !== 'txt') {
                show_jsonmsg(['status' => -1, 'remsg' => '只支持txt文件']);
            }

            if(is_uploaded_file($file['tmp_name'])) {
                $file_name = random_string('alnum', 6);
                $file_path = APPPATH . 'tmp';
                if(! file_exists($file_name)) {
                    mkdir($file_path);
                }
                $file_name = $file_path . DIRECTORY_SEPARATOR . $file_name;
                move_uploaded_file($file['tmp_name'], $file_name);
            }

            if(! file_exists($file_name)) {
                $this->outputJson('上传文件失败', -1);
            }

            $fh = fopen($file_name, 'r');
            while (!empty($data = fscanf($fh, "%s %s"))) {
                $list[]['studentID'] = $data[0];
                $list[]['password'] = $data[1];
            }

            $this->outputJson(print_r($list, true), 500);

            if(empty($list)){
                $this->outputJson('上传内容为空', -1);
            }


            foreach ($list as $item) {
                if(empty($item[0]) || empty($item[1])) {
                    continue;
                }
                $data['studentID'] = $item[0];
                $data['username'] = $data['studentID'];
                $data['salt'] = random_string('alnum', 6);
                $data['password'] = md5pass($item[1], $data['salt']);
                $data['createtime'] = NOWTIME;
                $data['lasttime'] = NOWTIME;
                $data['regip'] = $_SERVER['SERVER_ADDR'] ? : '';
                try {
//                    $this->Data_model->addData($data, $this->tablefunc);
                } catch (\Exception $e) {
                    show_jsonmsg(['status' => 500, 'remsg' => $e->getMessage()]);
                }

            }

            fclose($fh);
            unlink($file_name);
            $this->outputJson('ok');
        } else {
            $res = array(
                'tpl'       => 'multi_add_view',
                'tablefunc' => $this->tablefunc,

            );
            show_jsonmsg(array('status' => 200, 'remsg' => $this->load->view($this->tablefunc, $res, true)));
        }
    }

    public function edit()
    {
        $this->Purview_model->checkPurviewAjax($this->tablefunc, 'edit');
        $post = $this->input->post(null, true);
        if ($post['id'] && $post['action'] == site_aurl($this->tablefunc)) {
            $data = elements($this->fields, $post);
            if (trim($data['password']) != '') {
                $data['password'] = md5pass(md5($data['password']), $data['salt']);
            } else {
                unset($data['password']);
            }
            $this->Data_model->editData(array('id' => $post['id']), $data);
            show_jsonmsg(array('status' => 200,
                               'id'     => $post['id'],
                               'remsg'  => $this->_setlist($this->Data_model->getSingle(array('id' => $post['id'])),
                                                           false)));
        } else {
            $id = $this->uri->segment(4);
            if ($id > 0 && $view = $this->Data_model->getSingle(array('id' => $id))) {
                $res = array(
                    'tpl'       => 'view',
                    'tablefunc' => $this->tablefunc,
                    'view'      => $view,
                );
                show_jsonmsg(array('status' => 200, 'remsg' => $this->load->view($this->tablefunc, $res, true)));
            } else {
                show_jsonmsg(array('status' => 203));
            }
        }
    }

    public function del()
    {
        $this->Purview_model->checkPurviewAjax($this->tablefunc, 'del');
        $ids = $this->input->post('optid', true);
        if ($ids) {
            $this->Data_model->delData($ids);
            $this->Cache_model->deleteSome($this->tablefunc . '_' . $this->editlang);
            $this->Cache_model->deleteSome('recommend_' . $this->editlang . '_' . $this->tablefunc);
            show_jsonmsg(array('status' => 200, 'remsg' => lang('delok'), 'ids' => $ids));
        } else {
            show_jsonmsg(array('status' => 203));
        }
    }

    function _setlist($data, $ismultiple = true)
    {
        $newdata = $ismultiple ? $data : ($newdata[0] = $data);
        if ($ismultiple) {
            $newdata = $data;
        } else {
            $newdata = array(0 => $data);
        }
        $newstr = '';
        $config = $this->Cache_model->loadConfig();
        foreach ($newdata as $key => $item) {
            $item['func'] = '';
            if ($this->Purview_model->checkPurviewFunc($this->tablefunc, 'edit')) {
                $item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc . '/edit/' . $item['id']),
                                                                     'edit');
            }
            if ($this->Purview_model->checkPurviewFunc($this->tablefunc, 'del')) {
                $item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc . '/del/' . $item['id']),
                                                                     'sdel',
                                                                     $item['id']);
            }
            if ($item['logined'] == 0) {
                $logined = '<span class="login_n">离线</span>';
            } else {
                $logined = '<span class="login_y">在线</span>';
            }

            $newstr .= '<tr id="tid_' . $item['id'] . '">
			<td width="30px"><input type=checkbox name="optid[]" value=' . $item['id'] . ' /></td>
			<td width="40px">' . $item['id'] . '</td>
			<td width="32px"><img width="32" heigth="32" src="' . $config['site_templateurl'] . $item['avatar'] . '"></img></td>
			<td width="100px">' . $item['username'] . '</td>
			<td width="100px">' . $item['realname'] . '</td>
			<td width="100px">' . $item['studentID'] . '</td>
			<td width="150px">' . $item['school'] . '</td>
			<td width="150px">' . $item['college'] . '</td>
			<td width="150px">' . $item['department'] . '</td>
			<td width="50px">' . $item['func'] . '</td></tr>';
        }

        return $newstr;
    }
}
