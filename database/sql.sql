

-- Tabela de Tipos de Documentos
CREATE TABLE public.tb_doc_type (
    id serial NOT NULL,
    name character varying(100) NOT NULL,
    initials character varying(3) NOT NULL,
    level bigint,    
    max_rev_period bigint,
    CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id)
);

ALTER TABLE public.tb_doc_type OWNER to postgres;

INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Cadeia de Valor', 1, 'CDV', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Diretriz', 1, 'DRT', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Manual', 1, 'MAN', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Norma', 1, 'NOR', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Política Institucional', 1, 'POL', 4);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Programa', 1, 'PRO', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Regimento', 1, 'REG', 4);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Fluxograma', 2, 'FLU', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Regulamento', 1, 'RGL', 4);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Mapeamento de Processos', 2, 'MAP', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Plano', 2, 'PLA', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Protocolo', 2, 'PTC', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Documentos Externos', 3, 'DEX', 0);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Lista Mestra de Documentos', 3, 'LMD', 0);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Procedimento Operacional Padrão / Rotina', 3, 'POP', 2);
INSERT INTO public.tb_doc_type (name, level, initials, max_rev_period) VALUES ('Registro da Qualidade', 3, 'REQ', 0);

-- Tabela Área
CREATE TABLE public.tb_area
(
    id serial NOT NULL,
    initials character varying(10) NOT NULL,
    name character varying(200) NOT NULL,
    CONSTRAINT tb_area_pkey PRIMARY KEY (id)
);

ALTER TABLE public.tb_area OWNER to postgres;

INSERT INTO public.tb_area (initials, name) VALUES ('SUP', 'Superintendência');
INSERT INTO public.tb_area (initials, name) VALUES ('AUDIT', 'Auditoria Interna HU-UFSCar');
INSERT INTO public.tb_area (initials, name) VALUES ('OUVID', 'Ouvidoria HU UFSCar');
INSERT INTO public.tb_area (initials, name) VALUES ('PRTC', 'Protocolo HU UFSCar');
INSERT INTO public.tb_area (initials, name) VALUES ('GA', 'Gerencia Administrativa');
INSERT INTO public.tb_area (initials, name) VALUES ('GAS', 'Gerencia de Atenção à Saúde');
INSERT INTO public.tb_area (initials, name) VALUES ('GEP', 'Gerencia de Ensino e Pesquisa');
INSERT INTO public.tb_area (initials, name) VALUES ('DAF', 'Divisão Administrativo Financeiro');
INSERT INTO public.tb_area (initials, name) VALUES ('DENF', 'Divisão de Enfermagem');
INSERT INTO public.tb_area (initials, name) VALUES ('DGC', 'Divisão de Gestão do Cuidado');
INSERT INTO public.tb_area (initials, name) VALUES ('DIVGP', 'Divisão de Gestão de Pessoas');
INSERT INTO public.tb_area (initials, name) VALUES ('DM', 'Divisão Médica');
INSERT INTO public.tb_area (initials, name) VALUES ('SA', 'Setor de Administração');
INSERT INTO public.tb_area (initials, name) VALUES ('SADT', 'Setor de Apoio Diagnóstico e Terapêutico');
INSERT INTO public.tb_area (initials, name) VALUES ('SAGAS', 'Setor de Apoio à Gestão da Atenção à Saúde');
INSERT INTO public.tb_area (initials, name) VALUES ('SCA', 'Setor do Cuidado Assistencial');
INSERT INTO public.tb_area (initials, name) VALUES ('SFH', 'Setor de Farmácia Hospitalar');
INSERT INTO public.tb_area (initials, name) VALUES ('SGE', 'Setor de Gestão do Ensino');
INSERT INTO public.tb_area (initials, name) VALUES ('SGPIT', 'Setor de Gestão da Pesquisa e Inovação Tecnológica');
INSERT INTO public.tb_area (initials, name) VALUES ('SGPTI', 'Setor de Gestão de Processos e Tecnologia da Informação');
INSERT INTO public.tb_area (initials, name) VALUES ('SGQSP', 'Setor de Gestão da Qualidade e Segurança do Paciente');
INSERT INTO public.tb_area (initials, name) VALUES ('SIF', 'Setor de Infraestrutura Física');
INSERT INTO public.tb_area (initials, name) VALUES ('SJ', 'Setor Jurídico');
INSERT INTO public.tb_area (initials, name) VALUES ('SL', 'Setor de Logística');
INSERT INTO public.tb_area (initials, name) VALUES ('SOFC', 'Setor de Orçamentos, Finanças e Controladoria');
INSERT INTO public.tb_area (initials, name) VALUES ('SRIA', 'Setor de Regulação e Informação Assistencial');
INSERT INTO public.tb_area (initials, name) VALUES ('UAC', 'Unidade de Apoio Corporativo');
INSERT INTO public.tb_area (initials, name) VALUES ('UAF', 'Unidade de Abastecimento Farmacêutico');
INSERT INTO public.tb_area (initials, name) VALUES ('UAGE', 'Unidade de Apoio a Gestão da Enfermagem');
INSERT INTO public.tb_area (initials, name) VALUES ('UALCA', 'Unidade de Atenção à Linha do Cuidado Adulto');
INSERT INTO public.tb_area (initials, name) VALUES ('UALCP', 'Unidade de Anteção à Linha do Cuidado Psicossocial');
INSERT INTO public.tb_area (initials, name) VALUES ('UAO', 'Unidade de Apoio Operacional');
INSERT INTO public.tb_area (initials, name) VALUES ('UAP', 'Unidade de Administração de Pessoal');
INSERT INTO public.tb_area (initials, name) VALUES ('UASCA', 'Unidade de Atenção à Linha do Cuidado da Saúde da Criança e do Adolescente');
INSERT INTO public.tb_area (initials, name) VALUES ('UC', 'Unidade de Cirurgia/RPA e CME');
INSERT INTO public.tb_area (initials, name) VALUES ('UCC', 'Unidade de Compras e Contratos');
INSERT INTO public.tb_area (initials, name) VALUES ('UCC', 'Unidade de Contabilidade de Custos');
INSERT INTO public.tb_area (initials, name) VALUES ('UCF', 'Unidade de Contabilidade Fiscal');
INSERT INTO public.tb_area (initials, name) VALUES ('UCS', 'Unidade de Comunicação Social');
INSERT INTO public.tb_area (initials, name) VALUES ('UDI', 'Unidade de Diagnóstico por Imagem');
INSERT INTO public.tb_area (initials, name) VALUES ('UDP', 'Unidade de Desenvolvimento de Pessoas');
INSERT INTO public.tb_area (initials, name) VALUES ('UEC', 'Unidade de Engenharia Clínica');
INSERT INTO public.tb_area (initials, name) VALUES ('UES', 'Unidade de e-saúde');
INSERT INTO public.tb_area (initials, name) VALUES ('UFCDF', 'Unidade de Farmácia Clínica e Dispensação Farmacêutica');
INSERT INTO public.tb_area (initials, name) VALUES ('UGAGET', 'Unidade de Gerenciamento de Atividades de Graduação e Ensino Técnico');
INSERT INTO public.tb_area (initials, name) VALUES ('UGAPG', 'Unidade de Gerenciamento de Atividades de Pós Graduação');
INSERT INTO public.tb_area (initials, name) VALUES ('UGQ', 'Unidade de Gestão da Qualidade');
INSERT INTO public.tb_area (initials, name) VALUES ('UH', 'Unidade de Hotelaria');
INSERT INTO public.tb_area (initials, name) VALUES ('UIC', 'Unidade de Infraestrutura de Comunicação');
INSERT INTO public.tb_area (initials, name) VALUES ('UL', 'Unidade de Licitações');
INSERT INTO public.tb_area (initials, name) VALUES ('ULACAP', 'Unidade de Laboratório de Análises Clínicas e Anatomia Patológica');
INSERT INTO public.tb_area (initials, name) VALUES ('ULD', 'Unidade de Liquidação da Despesa');
INSERT INTO public.tb_area (initials, name) VALUES ('UNAPS', 'Unidade de Abastecimento de Produtos para Saúde');
INSERT INTO public.tb_area (initials, name) VALUES ('UNC', 'Unidade de Nutrição Clínica');
INSERT INTO public.tb_area (initials, name) VALUES ('UNIAL', 'Unidade de Almoxarifado');
INSERT INTO public.tb_area (initials, name) VALUES ('UNIPA', 'Unidade de Patrimonio');
INSERT INTO public.tb_area (initials, name) VALUES ('UP', 'Unidade de Planejamento');
INSERT INTO public.tb_area (initials, name) VALUES ('UPD', 'Unidade de Pagamento da Despesa');
INSERT INTO public.tb_area (initials, name) VALUES ('UPIAMA', 'Unidade de Processamento das Informações Assistenciais, Monitoramento e Avaliação');
INSERT INTO public.tb_area (initials, name) VALUES ('URA', 'Unidade de Regulação Assistencial');
INSERT INTO public.tb_area (initials, name) VALUES ('URE', 'Unidade de Reabilitação');
INSERT INTO public.tb_area (initials, name) VALUES ('USP', 'Unidade de Segurança do Paciente');
INSERT INTO public.tb_area (initials, name) VALUES ('USS', 'Unidade de Simulação em Saúde');
INSERT INTO public.tb_area (initials, name) VALUES ('UVS', 'Unidade de Vigilância em Saúde');

-- Tabela de Tipos de Processos
CREATE TABLE public.tb_process_type
(
    id serial NOT NULL,
    name character varying(100) NOT NULL,
    initials character varying(2) NOT NULL,
    CONSTRAINT tb_process_type_pkey PRIMARY KEY (id)
);

ALTER TABLE public.tb_process_type
    OWNER to postgres;

--
-- Data for Name: tb_process_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos Gerenciais', 'PG');
INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos Finalísticos', 'PF');
INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos de Apoio', 'PA');