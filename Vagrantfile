BOX_IMAGE = "debian/bookworm64"
PROVIDER = "virtualbox"
NOM_MAQUINA_VIRTUAL = "dev11"
NUM_CPUS = 2
MEMORIA_RAM = 2048
CARPETA_MAQ_FIS = "./codi"
CARPETA_MAQ_VIR = "/home/vagrant/a11"
TARGETA_XARXA = "Intel(R) Wireless-AC 9462"
NOM_BASE= "dev11"

Vagrant.configure("2") do |config|

  config.vm.box = BOX_IMAGE
  config.vm.hostname = NOM_BASE
  config.vm.network "public_network", bridge: TARGETA_XARXA

  config.vm.provider PROVIDER do |provider|
    provider.name = NOM_MAQUINA_VIRTUAL
    provider.memory = MEMORIA_RAM
    provider.cpus = NUM_CPUS
    provider.customize ['modifyvm', :id, '--clipboard', 'bidirectional']
  end

  config.vm.synced_folder CARPETA_MAQ_FIS, CARPETA_MAQ_VIR

  config.vm.provision "shell", inline: <<-SHELL
    #### Instal·lació d'algunes eines de sistema
    sudo apt-get update -y
    sudo apt-get install -y net-tools whois aptitude git zip unzip curl apache2 php libapache2-mod-php php-cli
    #### Instal·lació de Docker
    sudo apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common
    curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"
    sudo apt-get update -y
    sudo sudo apt-get -y install docker-ce docker-ce-cli containerd.io docker-compose
    sudo gpasswd -a vagrant docker
    exit
    SHELL
end
