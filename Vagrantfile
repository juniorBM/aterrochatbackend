# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/xenial64"

  config.vm.hostname = "aterrochat-dev-box"

  config.vm.box_check_update = false

  config.vm.network "private_network", ip: "192.168.80.81"

  config.vm.network "public_network"

  config.vm.network "forwarded_port", guest: 80, host: 8081
  config.vm.network "forwarded_port", guest: 3306, host: 33067
  config.vm.network "forwarded_port", guest: 27017, host: 27018

  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777,fmode=777"]

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "512"
  end

  config.vm.provision "shell", path: 'bootstrap.sh', keep_color: true
  
end
  