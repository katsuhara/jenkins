jenkins!
=======
##PHP分析用のPHP側の準備
* 一度コードを取得して`fuelphp/fuel/app/config`に`db.php`を設置し、環境に応じた内容に書き換える。

##PHP分析用のjenkinsの設定
* プロジェクトの設定で、下記のビルド手順を追加する。  
composerで必要なパッケージをインストールしてから、
vendor内のphingを使ってビルドをしている。
```
cd fuelphp/
php composer.phar install
cd ..
fuelphp/fuel/vendor/bin/phing -buildfile phpconfig/build.xml -logger phing.listener.DefaultLogger
```

* プロジェクトの設定で、ビルド後の設定に以下を追加する。
  * PMD警告の集計  
    集計するファイル：`pmd*.xml`
  * 重複コード分析の集計  
    集計するファイル：`cpd*.xml`  
    重要度の閾値：任意
  * Cloverカバレッジレポートを集計  
    cloverレポートディレクトリ：`clover`  
    cloverレポートファイル名：`clover.xml`  
    カバレッジメトリクスの対象：任意
  * JUnitテスト結果の集計  
    テスト結果XML：`junit.xml`