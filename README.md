### floalaeditor2.8.1破解bundle
```
composer require mashmars/froalaeditor
```
### symfony4 配置如下
```
# config/bundles.php
Mashmars\FroalaeditorBundle\FroalaeditorBundle::class => ['all' => true],
# 添加静态文件
php bin/console assets:install
```

#### 新增配置froalaeditor.yaml
```
# config/packages/froalaeditor.yaml

froalaeditor: 
  upload_directory:
    image_directory: ./upload/images  # 图片上传目录 以及 图片检索目录
    video_directory: ./upload/videos  # 视频上传目录
    file_directory: ./upload/files    # 文件上传目录
```
#### 修改twig.yaml配置
```
# config/packages/twig.yaml 新增字段模板
form_themes:
    - '@Froalaeditor/Form/froalaeditor_type.twig'
```
#### 引入FroalaeditorBundle路由
```
# config/routes.yaml 新增
froalaeditor:
  resource: '@FroalaeditorBundle/Resources/config/route.yaml'  
  prefix: /
```
#### formType使用
```
use Mashmars\FroalaeditorBundle\Form\FroalaeditorType;
$builder->add('content', FroalaeditorType::class)
```
####效果
![效果图](/xiaoguo.png)
