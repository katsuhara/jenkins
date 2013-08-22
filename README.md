jenkins!
=======

##PHP分析用のjenkinsの設定
プロジェクトの設定で、下記のビルド手順を追加する。
composerで必要なパッケージをインストールしてから、
vendor内のphingを使ってビルドをしている。

    cd fuelphp/
    php composer.phar install
    cd ..
    fuelphp/fuel/vendor/bin/phing -buildfile phpconfig/build.xml -logger phing.listener.DefaultLogger
