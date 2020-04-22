create database safebet1;

create table `utilizador`(
    `idUtilizador` int not null AUTO_INCREMENT,
    `nome` char(45) not null,
    `sobrenome` char(45) not null,
    `data_nasc` date not null,
    `email` char(45) not null,
    `password` char(45) not null,
    `dinheiro` int not null,
    
    primary key(`idUtilizador`)
    )engine=innodb;


create table `apostaRoleta` (
    `idAposta` int AUTO_INCREMENT not null,
    `dinheiroApostado` int not null,    
    `corApostada` char(15) not null,
    `final` enum('G','P') not null,
    `idUtilizador` int not null ,
    
    primary key(`idAposta`),
    index `fk_utilizador_aposta`(`idUtilizador` ASC),
    constraint `utilizador_aposta`
    foreign key(`idUtilizador`)
    references `utilizador`(`idUtilizador`)
    
   )engine=innodb;

create table `blackjackaposta` (
    
    `idAposta` int not null AUTO_INCREMENT,
    `dinheiroApostado` int not null,
    `vencedor` enum('D','P') not null,
    `idUtilizador` int not null,
    
    primary key(`idAposta`),
    
    index `fk_utilizador_apostablackjack` (`idUtilizador` ASC),
    constraint `utilizador_apostablackjack`
    foreign key (`idUtilizador`)
    references utilizador(`idUtilizador`)
    )engine=innodb;


create table pagamentos(
    
    `idPagamento` int not null AUTO_INCREMENT,
    `idPagamentoDPaypal` char(45) not null,
    `idBuyerDPaypal` char(45) not null,
    `idUtilizador` int not null,
    `coins_compradas` int not null,
    `dinheiroPago` float not null,

    primary key(`idPagamento`),

    index `fk_utilizador_pagamentos`(`idUtilizador` ASC),
    constraint `utilizador_pagamentos`
    foreign key(`idUtilizador`)
    references `utilizador`(`idUtilizador`)

    )engine=innodb;

create table if not exists `admin`(
    `idAdmin` int not null auto_increment,
    `nome` char(45) not null,
    `sobrenome` char(45) not null,
    `email` char(45) not null,
    `password` char(45) not null,
    `data_nasc` date not null,
    
    primary key(`idAdmin`)
    )engine=innodb;


    create table reclamacoes(
   `idReclamacao` int not null auto_increment,
    `Assunto` char(45) not null,
    `texto` char(255) not null,
    `email` char(45) not null,
    `idUtilizador` int not null,
    
    primary key(`idReclamacao`),
    
    index `fk_utilizador_reclamacao`(`idReclamacao` ASC),
    constraint `utilizador_reclamacao`
    foreign key (`idUtilizador`)
    references `utilizador`(`idUtilizador`)
    
    )engine=innodb;