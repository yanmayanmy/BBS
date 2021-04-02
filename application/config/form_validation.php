<?php
//contoroller内のrun()でバリデーションしてくれる。

$config = [
    //掲示板書き込み用
	'add_message' =>[
    [
        'field' => 'view_name', 
        'label' => '表示名', 
        'rules' => 'required'
    ],
	[
        'field' => 'message', 
        'label' => 'ひと言メッセージ', 
        'rules' => 'required|max_length[140]'
    ]
    ],

    //会員登録ページ
	'register' =>[
	[
        'field' => 'member_name', 
        'label' => '名前', 
        'rules' => 'required|max_length[20]'
    ],
	[
        'field' => 'member_name_kana', 
        'label' => 'カナ', 
        'rules' => 'required|max_length[20]'
    ],
    [
        'field' => 'member_tel', 
        'label' => '電話番号', 
        'rules' => 'required|numeric'
    ],
	[
        'field' => 'member_email', 
        'label' => 'メールアドレス', 
        'rules' => 'required|valid_email|is_unique[member.email]'
    ],
	[
        'field' => 'member_birth', 
        'label' => '生まれ年', 
        'rules' => 'required'
    ],
	[
        'field' => 'member_password', 
        'label' => 'パスワード', 
        'rules' => 'required|max_length[20]'
    ],
	[
        'field' => 'member_gender', 
        'label' => '性別', 
        'rules' => 'required'
    ],
	[
        'field' => 'member_subscribe', 
        'label' => 'メールマガジン送付', 
        'rules' => ''
    ]
    ],

    'login' =>[
        [
            'field' => 'email', 
            'label' => 'メールアドレス', 
            'rules' => 'required|valid_email'
        ],
        [
            'field' => 'password', 
            'label' => 'パスワード', 
            'rules' => 'required'
        ]
        ]
];
