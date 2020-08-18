
CREATE TABLE tb_doc_type (
  id int(11) auto_increment NOT NULL,
  name varchar(100) NOT NULL,
  initials varchar(3) NOT NULL,
  level bigint,
  max_rev_period bigint,
  PRIMARY KEY(`id`)
);

INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Cadeia de Valor', 1, 'CDV', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Diretriz', 1, 'DRT', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Manual', 1, 'MAN', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Norma', 1, 'NOR', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Política Institucional', 1, 'POL', 4);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Programa', 1, 'PRO', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Regimento', 1, 'REG', 4);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Fluxograma', 2, 'FLU', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Regulamento', 1, 'RGL', 4);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Mapeamento de Processos', 2, 'MAP', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Plano', 2, 'PLA', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Protocolo', 2, 'PTC', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Documentos Externos', 3, 'DEX', 0);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Lista Mestra de Documentos', 3, 'LMD', 0);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Procedimento Operacional Padrão / Rotina', 3, 'POP', 2);
INSERT INTO tb_doc_type (name, level, initials, max_rev_period) VALUES ('Registro da Qualidade', 3, 'REQ', 0);

CREATE TABLE tb_area(
  id int(11) auto_increment NOT NULL,
  initials varchar(10) NOT NULL,
  name varchar(200) NOT NULL,
  PRIMARY KEY(`id`)
);

INSERT INTO tb_area (initials, name) VALUES ('SUP', 'Superintendência');
INSERT INTO tb_area (initials, name) VALUES ('AUDIT', 'Auditoria Interna HU-UFSCar');
INSERT INTO tb_area (initials, name) VALUES ('OUVID', 'Ouvidoria HU UFSCar');
INSERT INTO tb_area (initials, name) VALUES ('PRTC', 'Protocolo HU UFSCar');
INSERT INTO tb_area (initials, name) VALUES ('GA', 'Gerencia Administrativa');
INSERT INTO tb_area (initials, name) VALUES ('GAS', 'Gerencia de Atenção à Saúde');
INSERT INTO tb_area (initials, name) VALUES ('GEP', 'Gerencia de Ensino e Pesquisa');
INSERT INTO tb_area (initials, name) VALUES ('DAF', 'Divisão Administrativo Financeiro');
INSERT INTO tb_area (initials, name) VALUES ('DENF', 'Divisão de Enfermagem');
INSERT INTO tb_area (initials, name) VALUES ('DGC', 'Divisão de Gestão do Cuidado');
INSERT INTO tb_area (initials, name) VALUES ('DIVGP', 'Divisão de Gestão de Pessoas');
INSERT INTO tb_area (initials, name) VALUES ('DM', 'Divisão Médica');
INSERT INTO tb_area (initials, name) VALUES ('SA', 'Setor de Administração');
INSERT INTO tb_area (initials, name) VALUES ('SADT', 'Setor de Apoio Diagnóstico e Terapêutico');
INSERT INTO tb_area (initials, name) VALUES ('SAGAS', 'Setor de Apoio à Gestão da Atenção à Saúde');
INSERT INTO tb_area (initials, name) VALUES ('SCA', 'Setor do Cuidado Assistencial');
INSERT INTO tb_area (initials, name) VALUES ('SFH', 'Setor de Farmácia Hospitalar');
INSERT INTO tb_area (initials, name) VALUES ('SGE', 'Setor de Gestão do Ensino');
INSERT INTO tb_area (initials, name) VALUES ('SGPIT', 'Setor de Gestão da Pesquisa e Inovação Tecnológica');
INSERT INTO tb_area (initials, name) VALUES ('SGPTI', 'Setor de Gestão de Processos e Tecnologia da Informação');
INSERT INTO tb_area (initials, name) VALUES ('SGQSP', 'Setor de Gestão da Qualidade e Segurança do Paciente');
INSERT INTO tb_area (initials, name) VALUES ('SIF', 'Setor de Infraestrutura Física');
INSERT INTO tb_area (initials, name) VALUES ('SJ', 'Setor Jurídico');
INSERT INTO tb_area (initials, name) VALUES ('SL', 'Setor de Logística');
INSERT INTO tb_area (initials, name) VALUES ('SOFC', 'Setor de Orçamentos, Finanças e Controladoria');
INSERT INTO tb_area (initials, name) VALUES ('SRIA', 'Setor de Regulação e Informação Assistencial');
INSERT INTO tb_area (initials, name) VALUES ('UAC', 'Unidade de Apoio Corporativo');
INSERT INTO tb_area (initials, name) VALUES ('UAF', 'Unidade de Abastecimento Farmacêutico');
INSERT INTO tb_area (initials, name) VALUES ('UAGE', 'Unidade de Apoio a Gestão da Enfermagem');
INSERT INTO tb_area (initials, name) VALUES ('UALCA', 'Unidade de Atenção à Linha do Cuidado Adulto');
INSERT INTO tb_area (initials, name) VALUES ('UALCP', 'Unidade de Anteção à Linha do Cuidado Psicossocial');
INSERT INTO tb_area (initials, name) VALUES ('UAO', 'Unidade de Apoio Operacional');
INSERT INTO tb_area (initials, name) VALUES ('UAP', 'Unidade de Administração de Pessoal');
INSERT INTO tb_area (initials, name) VALUES ('UASCA', 'Unidade de Atenção à Linha do Cuidado da Saúde da Criança e do Adolescente');
INSERT INTO tb_area (initials, name) VALUES ('UC', 'Unidade de Cirurgia/RPA e CME');
INSERT INTO tb_area (initials, name) VALUES ('UCC', 'Unidade de Compras e Contratos');
INSERT INTO tb_area (initials, name) VALUES ('UCC', 'Unidade de Contabilidade de Custos');
INSERT INTO tb_area (initials, name) VALUES ('UCF', 'Unidade de Contabilidade Fiscal');
INSERT INTO tb_area (initials, name) VALUES ('UCS', 'Unidade de Comunicação Social');
INSERT INTO tb_area (initials, name) VALUES ('UDI', 'Unidade de Diagnóstico por Imagem');
INSERT INTO tb_area (initials, name) VALUES ('UDP', 'Unidade de Desenvolvimento de Pessoas');
INSERT INTO tb_area (initials, name) VALUES ('UEC', 'Unidade de Engenharia Clínica');
INSERT INTO tb_area (initials, name) VALUES ('UES', 'Unidade de e-saúde');
INSERT INTO tb_area (initials, name) VALUES ('UFCDF', 'Unidade de Farmácia Clínica e Dispensação Farmacêutica');
INSERT INTO tb_area (initials, name) VALUES ('UGAGET', 'Unidade de Gerenciamento de Atividades de Graduação e Ensino Técnico');
INSERT INTO tb_area (initials, name) VALUES ('UGAPG', 'Unidade de Gerenciamento de Atividades de Pós Graduação');
INSERT INTO tb_area (initials, name) VALUES ('UGQ', 'Unidade de Gestão da Qualidade');
INSERT INTO tb_area (initials, name) VALUES ('UH', 'Unidade de Hotelaria');
INSERT INTO tb_area (initials, name) VALUES ('UIC', 'Unidade de Infraestrutura de Comunicação');
INSERT INTO tb_area (initials, name) VALUES ('UL', 'Unidade de Licitações');
INSERT INTO tb_area (initials, name) VALUES ('ULACAP', 'Unidade de Laboratório de Análises Clínicas e Anatomia Patológica');
INSERT INTO tb_area (initials, name) VALUES ('ULD', 'Unidade de Liquidação da Despesa');
INSERT INTO tb_area (initials, name) VALUES ('UNAPS', 'Unidade de Abastecimento de Produtos para Saúde');
INSERT INTO tb_area (initials, name) VALUES ('UNC', 'Unidade de Nutrição Clínica');
INSERT INTO tb_area (initials, name) VALUES ('UNIAL', 'Unidade de Almoxarifado');
INSERT INTO tb_area (initials, name) VALUES ('UNIPA', 'Unidade de Patrimonio');
INSERT INTO tb_area (initials, name) VALUES ('UP', 'Unidade de Planejamento');
INSERT INTO tb_area (initials, name) VALUES ('UPD', 'Unidade de Pagamento da Despesa');
INSERT INTO tb_area (initials, name) VALUES ('UPIAMA', 'Unidade de Processamento das Informações Assistenciais, Monitoramento e Avaliação');
INSERT INTO tb_area (initials, name) VALUES ('URA', 'Unidade de Regulação Assistencial');
INSERT INTO tb_area (initials, name) VALUES ('URE', 'Unidade de Reabilitação');
INSERT INTO tb_area (initials, name) VALUES ('USP', 'Unidade de Segurança do Paciente');
INSERT INTO tb_area (initials, name) VALUES ('USS', 'Unidade de Simulação em Saúde');
INSERT INTO tb_area (initials, name) VALUES ('UVS', 'Unidade de Vigilância em Saúde');


CREATE TABLE tb_process_type(
  id int(11) auto_increment NOT NULL,
  name varchar(100) NOT NULL,
  initials varchar(2) NOT NULL,
  PRIMARY KEY(`id`)
);

INSERT INTO tb_process_type (name, initials) VALUES ('Processos Gerenciais', 'PG');
INSERT INTO tb_process_type (name, initials) VALUES ('Processos Finalísticos', 'PF');
INSERT INTO tb_process_type (name, initials) VALUES ('Processos de Apoio', 'PA');


CREATE TABLE tb_user(
  codigo int(11) auto_increment NOT NULL,
  usuario varchar(50) NOT NULL,
  nome varchar(100) NOT NULL,
  senha varchar(120) NOT NULL,
  permissao smallint NOT NULL,
  PRIMARY KEY(`codigo`)
);

INSERT INTO tb_user (usuario, nome, senha, permissao) VALUES ('admin','Administrador', '$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa', 1);
INSERT INTO tb_user (usuario, nome, senha, permissao) VALUES ('user','Usuário', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);
INSERT INTO tb_user (usuario, nome, senha, permissao) VALUES ('leandro','Leandro C. Ramos', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);


CREATE TABLE tb_macroprocess(
  id int(11) auto_increment NOT NULL,
  name varchar(100) NOT NULL,
  `number` bigint NOT NULL,
  id_proc_type bigint
    REFERENCES tb_process_type (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    PRIMARY KEY(`id`)
);

INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar Atividades de Ouvidoria', 1, 1);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir estratégia institucional', 2, 1);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir qualidade institucional', 3, 1);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar atendimento de urgência e emergência', 1, 2);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar internação', 2, 2);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar exames', 3, 2);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir ensino, pesquisa e extensão', 4, 2);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar atendimento ambulatorial', 5, 2);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir patrimônio', 1, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir hotelaria hospitalar', 5, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Processar produtos para saúde (CME)', 6, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir atividades de regulação', 7, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir infraestrutura física e tecnológica', 9, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir logística e suprimentos', 10, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir pessoas', 11, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir processos administrativo financeira', 12, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir tecnologia de informação e processos', 13, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir farmácia hospitalar', 14, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir nutrição', 15, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir segurança do trabalhador', 17, 3);
INSERT INTO tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir consultoria jurídica', 18, 3);


CREATE TABLE tb_process(
  id int(11) auto_increment NOT NULL,
  name varchar(100) NOT NULL,
  `number` bigint NOT NULL,
  id_macroprocess bigint NOT NULL,
  `status` varchar(2) NOT NULL
    REFERENCES tb_macroprocess (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    PRIMARY KEY(`id`)
);

INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir demandas da ouvidoria', 1, 1, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Avaliar satisfação', 2, 1, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir planejamento estratégico', 1, 2, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir estrutura organizacional', 2, 2, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir política, diretrizes e normas', 3, 2, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir comitês, comissões e grupos de trabalho', 4, 2, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir vigilância epidemiológica', 3, 3, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar auditoria interna da qualidade', 2, 3, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir documentos institucionais', 1, 3, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir segurança do paciente', 4, 3, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir controle de infecção', 5, 3, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir óbitos', 6, 3, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Triar e investigar eventos adversos', 7, 3, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber paciente', 1, 4, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Classificar risco', 2, 4, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Atender paciente', 3, 4, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar alta hospitalar', 4, 4, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Admitir na internação', 1, 5, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar cuidado médico', 2, 5, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar cuidado de enfermagem', 3, 5, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar cuidado multiprofissional', 4, 5, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber paciente ambulatorial', 1, 8, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Atender paciente ambulatorial', 2, 8, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar alta ambulatorial', 3, 8, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar atividades de promoção à saúde', 5, 8, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir recursos ambulatoriais', 6, 8, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar exames laboratoriais', 1, 6, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar exames de imagem', 2, 6, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar exames de métodos gráficos', 3, 6, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Executar rotina laboratorial', 4, 6, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar atividades de ensino de graduação, técnico e tecnólogo', 1, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Acompanhar e finalizar as atividades de ensino de gradução, técnico e tecnólogo', 2, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar atividades de ensino de pós graduação', 3, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Acompanhar e finalizar atividades de ensino de pós graduação', 4, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar projetos de pesquisa', 5, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Acompanhar e finalizar projetos de pesquisa', 6, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar atividades de extensão, residência ou pós graduação', 7, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Acompanhar e finalizar atividades de extensão, residência ou pós graduação', 8, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Agendar atividades de simulação', 9, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Preparar e montar simulação', 10, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Desmontar simulação', 11, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar capacitaçãoes de público externo na USS', 13, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar resumos', 13, 7, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir atividades de e-Saúde', 15, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Agendar e realizar teleconsulta', 16, 7, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Atuar em incêndio', 1, 20, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Comunicar e acompanhar acidente de trabalho', 2, 20, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir afastamentos de saúde', 3, 20, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir estoque de material de limpeza e higiene', 1, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar higienização hospitalar', 2, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Remover enxoval sujo', 5, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber e distribuir enxoval limpo', 6, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar inventário de enxoval', 7, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Descartar resíduos comuns e infectantes A1 e A4', 8, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Descartar pilhas e baterias', 9, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Prover dietas', 10, 10, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar ativação de EMH', 7, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Desenvolver cronograma de manutenção programada de EMH', 8, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar manutenção programada de EMH', 9, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Desativar EMH', 10, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar inventário de EMH', 11, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir contingências de infraestrutura física', 6, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir projetos e obras', 2, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir manutenção predial', 3, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir fornecimento de gases', 4, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Capacitar usuários de equipamentos', 5, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Planejar aquisição de EMH', 1, 13, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber insumos', 1, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Planejar inclusão de materiais no elenco', 7, 14, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Controlar estoque de insumos', 2, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir contingência de insumos', 3, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Notificar e trocar por motivo de desvio de qualidade', 1, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Distribuir insumos', 4, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Revisar elenco de materiais', 5, 14, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Dimensionar pessoal', 1, 15, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Convocar, contratar e admitir pessoal', 2, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Conceder benefícios e direitos', 3, 15, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir escala e banco de horas', 4, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Participar de evento externo', 5, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Desligar pessoal', 6, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Submeter e aprovar projetos de capacitação sem custos para o HU-UFSCar', 7, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Prover capacitação interna', 8, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Contratar capacitação para colaboradores', 9, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Avaliar desempenho de empregado em período de experiência', 10, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Participar de capacitação externa com afastamento do país - curta duração', 11, 15, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Designar substituto de cargo ou função', 12, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Elaborar PDC', 13, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir ponto eletrônico', 14, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Contratar sobrejornada', 15, 15, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Acompanhar execução do PDC', 16, 15, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir PDI', 17, 15, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Programar ou alterar férias', 18, 15, 'P');
-- inserir daqui pra frente no HU
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Fornecer dietas (lactário)', 1, 19, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Fornecer refeições para pacientes', 2, 19, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar atendimento nutricional', 3, 19, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Recolher e higienizar utensílios', 4, 19, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Prover consultoria jurídica', 1, 21, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar produtos para saúde', 1, 11, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar governança de TIC', 1, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Apoiar provimento de tecnologias de comunicação', 2, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir infraestrutura tecnológica e suporte aos usuários', 3, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Promover a gestão por processos', 4, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Prover e manter sistemas', 5, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Prover segurança da informação', 6, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar gestão documental', 7, 17, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Criar login institucional', 10, 17, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar backup e restore', 11, 17, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar informações assistenciais ambulatoriais ', 1, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Movimentar prontuários', 2, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Monitorar e avaliar indicadores', 3, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar regulação interna de leito para internação', 4, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar contratualização', 5, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Gerir fila de internação', 6, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Arquivar prontuários', 7, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Processar informações assistenciais de internação', 8, 12, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar compras', 1, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar licitação', 2, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar execução financeira', 3, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Identificar inconsistências contábeis', 8, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Escriturar notas de prestação de serviços', 9, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Converter balanços públicos', 10, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Contabilizar RMA-RMBI e conciliar contas de almoxarifado e patrimônio', 11, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Conferir habilitação econômico-financeira de licitantes', 12, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Apurar custos hospitalares', 13, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Conciliar saldos de almoxarifados', 14, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Formalizar contratos', 16, 16, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar ateste de notas fiscais de serviços', 17, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Comprovar vantajosidade de ata de registro de preços', 18, 16, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Transferir medicamentos', 2, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Dispensar medicamentos', 3, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Avaliar e triar prescrição médica', 4, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Revisar elenco de medicamentos', 5, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Controlar estoque de medicamentos UDF', 6, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Distribuir medicamentos UDF', 7, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Verificar validade, troca, doação e descarte de medicamentos', 10, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber devolução de medicamentos dispensados', 11, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Solicitar empréstimo de medicamentos', 12, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Devolver empréstimo de medicamentos', 13, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Conceder empréstimo de medicamentos', 14, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Monitorar empréstimos de medicamentos concedidos', 15, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Receber devolução de empréstimos concedidos', 16, 18, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Conferir validade dos medicamentos nos carros de emergência', 17, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Descartar insumos vencidos', 18, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Atender requisições', 19, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Repor estoque da UFCDF', 20, 18, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Cadastrar bens', 4, 9, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Movimentar bens', 5, 9, 'C');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Inventariar bens', 6, 9, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Desfazer bens', 7, 9, 'P');
INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES ('Realizar empréstimo de bens', 15, 9, 'C');

CREATE TABLE tb_documents(
  id int(11) auto_increment NOT NULL,
  title varchar(150),
  `number` int(11),
  version int(11),
  area int(11),
  process int(11),
  maker varchar(250),
  reviewer varchar(250),
  validator varchar(250),
  approver varchar(250),
  approval_date timestamp,
  situation varchar(20),
  `status` varchar(20),
  doc_type int(11),
  created_at timestamp,
  updated_at date,
  code varchar(255),
  filename_doc_sub varchar(100),
  filename_pdf_final varchar(100),
  submit_user varchar(50),
  submit_type varchar(30),
  process_sei varchar(30),
  document_sei varchar(30),
  dispatch_sei varchar(30),
  filename_doc_final varchar(100),
  observation text,
    FOREIGN KEY (area)
    REFERENCES tb_area (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    FOREIGN KEY (doc_type)
    REFERENCES tb_doc_type (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    FOREIGN KEY (process)
    REFERENCES tb_process (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    PRIMARY KEY(`id`)
);

INSERT INTO tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (115, '1', 1, 1, 5, 3, 'a', 'a', 'a', 'a', '2020-08-03 00:00:00-03', 'A', '3', 8, '2020-08-07 20:37:09.292282-03', NULL, 'MAN.SUP.PG0301.001', 'MAN.SUP.PG0301.001.docx', 'MAN.SUP.PG0301.001.', 'user', 'N', '', '', '', 'MAN.SUP.PG0301.001.', NULL);
INSERT INTO tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (116, 'Doc 03', 1, 3, 6, 3, 'a', 'a', 'a', 'a', '2020-08-07 00:00:00-03', 'A', '2', 4, '2020-08-08 16:20:20.863208-03', NULL, 'NOR.GAS.PA0903.001', 'NOR.GAS.PA0903.001.', NULL, 'admin', 'N', 'a', 'a', 'a', NULL, NULL);
INSERT INTO tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (117, 'Doc 05', 1, 2, 8, 1, 'a', 'a', 'a', 'a', '2020-08-05 00:00:00-03', 'A', '1', 7, '2020-08-08 16:26:15.135215-03', NULL, 'REG.DAF.PA0902.001', 'REG.DAF.PA0902.001.', 'REG.DAF.PG0301.001.', 'admin', 'R', '', '', '', 'REG.DAF.PG0301.001.', NULL);
