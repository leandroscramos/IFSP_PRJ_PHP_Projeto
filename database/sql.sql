-- Database: teste_db

--DROP DATABASE teste_db;

/* CREATE DATABASE projeto_db
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1; */

-- Table: public.tb_doc_type

CREATE TABLE public.tb_doc_type (
    id serial NOT NULL,
    name character varying(100) NOT NULL,
    initials character varying(3) NOT NULL,
    level bigint,    
    max_rev_period bigint,
    CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id)
);

ALTER TABLE public.tb_doc_type OWNER to postgres;

--
-- Data for Name: public.tb_doc_type; Type: TABLE DATA; Schema: public; Owner: postgres
--
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

-- Table: public.tb_area

CREATE TABLE public.tb_area
(
    id serial NOT NULL,
    initials character varying(10) NOT NULL,
    name character varying(200) NOT NULL,
    CONSTRAINT tb_area_pkey PRIMARY KEY (id)
);

ALTER TABLE public.tb_area OWNER to postgres;

--
-- Data for Name: public.tb_area; Type: TABLE DATA; Schema: public; Owner: postgres
--
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

-- Table: public.tb_process_type

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
-- Data for Name: public.tb_process_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos Gerenciais', 'PG');
INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos Finalísticos', 'PF');
INSERT INTO public.tb_process_type (name, initials) VALUES ('Processos de Apoio', 'PA');

-- Table: public.tb_user

CREATE TABLE public.tb_user
(
    codigo serial NOT NULL,
    usuario character varying(50) NOT NULL,
    senha character varying(120) NOT NULL,
    permissao smallint NOT NULL,
    CONSTRAINT usuario_pkey PRIMARY KEY (codigo)
);

ALTER TABLE public.tb_user
    OWNER to postgres;

--
-- Data for Name: public.tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--
INSERT INTO public.tb_user (usuario, senha, permissao) VALUES ('admin', '$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa', 1);
INSERT INTO public.tb_user (usuario, senha, permissao) VALUES ('user', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);
INSERT INTO public.tb_user (usuario, senha, permissao) VALUES ('leandro', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);


-- Table: public.tb_macroprocess

CREATE TABLE public.tb_macroprocess
(
    id serial NOT NULL,
    name character varying(100) NOT NULL,
    "number" bigint NOT NULL,
    id_proc_type bigint,
    CONSTRAINT tb_macroprocess_pkey PRIMARY KEY (id),
    CONSTRAINT tb_macroprocess_id_proc_type_fkey FOREIGN KEY (id_proc_type)
        REFERENCES public.tb_process_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE public.tb_macroprocess
    OWNER to postgres;

--
-- Data for Name: public.tb_macroprocess; Type: TABLE DATA; Schema: public; Owner: postgres
--
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar Atividades de Ouvidoria', 1, 1);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir estratégia institucional', 2, 1);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir qualidade institucional', 3, 1);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar atendimento de urgência e emergência', 1, 2);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar internação', 2, 2);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar exames', 3, 2);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir ensino, pesquisa e extensão', 4, 2);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Realizar atendimento ambulatorial', 5, 2);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir patrimônio', 1, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir hotelaria hospitalar', 5, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Processar produtos para saúde (CME)', 6, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir atividades de regulação', 7, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir infraestrutura física e tecnológica', 9, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir logística e suprimentos', 10, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir pessoas', 11, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir processos administrativo financeira', 12, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir tecnologia de informação e processos', 13, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir farmácia hospitalar', 14, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir nutrição', 15, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir segurança do trabalhador', 17, 3);
INSERT INTO public.tb_macroprocess (name, number, id_proc_type) VALUES ('Gerir consultoria jurídica', 18, 3);


-- Table: public.tb_process

CREATE TABLE public.tb_process
(
    id serial NOT NULL,
    name character varying(100) NOT NULL,
    "number" bigint NOT NULL,
    id_macroprocess bigint NOT NULL,
    status character varying(2) NOT NULL,
    CONSTRAINT tb_process_pkey PRIMARY KEY (id),
    CONSTRAINT tb_process_id_macroprocess_fkey FOREIGN KEY (id_macroprocess)
        REFERENCES public.tb_macroprocess (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE public.tb_process
    OWNER to postgres;

--
-- Data for Name: public.tb_process; Type: TABLE DATA; Schema: public; Owner: postgres
--
INSERT INTO public.tb_process (name, number, id_macroprocess, status) VALUES ('Gerir documentos institucionais', 1, 6, 'P');
INSERT INTO public.tb_process (name, number, id_macroprocess, status) VALUES ('Gerir projetos e obras', 2, 14, 'P');
INSERT INTO public.tb_process (name, number, id_macroprocess, status) VALUES ('Gerir contingências de infraestrutura física', 6, 14, 'P');
INSERT INTO public.tb_process (name, number, id_macroprocess, status) VALUES ('Triar e investigar eventos adversos', 7, 6, 'P');
INSERT INTO public.tb_process (name, number, id_macroprocess, status) VALUES ('Gerir manutenção predial', 3, 14, 'P');

-- Table: public.tb_documents

CREATE TABLE public.tb_documents
(
    id serial NOT NULL,
    title character varying(150),
    "number" integer,
    version integer,
    area integer,
    process integer,
    maker character varying(250),
    reviewer character varying(250),
    validator character varying(250),
    approver character varying(250),
    approval_date timestamp with time zone,
    situation character varying(20),
    status character varying(20),
    doc_type integer,
    created_at timestamp with time zone,
    updated_at date,
    code character varying,
    filename_doc_sub character varying(100),
    filename_pdf_final character varying(100),
    submit_user character varying(50),
    submit_type character varying(30),
    process_sei character varying(30),
    document_sei character varying(30),
    dispatch_sei character varying(30),
    filename_doc_final character varying(100),
    observation character varying(1000),
    CONSTRAINT tb_documents_pkey PRIMARY KEY (id),
    CONSTRAINT tb_documents_id_area_fkey FOREIGN KEY (area)
        REFERENCES public.tb_area (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT tb_documents_id_doc_type_fkey FOREIGN KEY (doc_type)
        REFERENCES public.tb_doc_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT tb_documents_id_process_fkey FOREIGN KEY (process)
        REFERENCES public.tb_process (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

ALTER TABLE public.tb_documents
    OWNER to postgres;

--
-- Data for Name: public.tb_documents; Type: TABLE DATA; Schema: public; Owner: postgres
--
INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (115, '1', 1, 1, 5, 3, 'a', 'a', 'a', 'a', '2020-08-03 00:00:00-03', 'A', '3', 8, '2020-08-07 20:37:09.292282-03', NULL, 'MAN.SUP.PG0301.001', 'MAN.SUP.PG0301.001.docx', 'MAN.SUP.PG0301.001.', 'user', 'N', '', '', '', 'MAN.SUP.PG0301.001.', NULL);
INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (116, 'Doc 03', 1, 3, 6, 3, 'a', 'a', 'a', 'a', '2020-08-07 00:00:00-03', 'A', '2', 4, '2020-08-08 16:20:20.863208-03', NULL, 'NOR.GAS.PA0903.001', 'NOR.GAS.PA0903.001.', NULL, 'admin', 'N', 'a', 'a', 'a', NULL, NULL);
INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (117, 'Doc 05', 1, 2, 8, 1, 'a', 'a', 'a', 'a', '2020-08-05 00:00:00-03', 'A', '1', 7, '2020-08-08 16:26:15.135215-03', NULL, 'REG.DAF.PA0902.001', 'REG.DAF.PA0902.001.', 'REG.DAF.PG0301.001.', 'admin', 'R', '', '', '', 'REG.DAF.PG0301.001.', NULL);