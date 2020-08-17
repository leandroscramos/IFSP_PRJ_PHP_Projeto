--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tb_area; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_area (
    id integer NOT NULL,
    initials character varying(10),
    name character varying(200)
);


ALTER TABLE public.tb_area OWNER TO postgres;

--
-- Name: tb_doc_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_doc_type (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    level bigint,
    initials character varying(3),
    max_rev_period bigint
);


ALTER TABLE public.tb_doc_type OWNER TO postgres;

--
-- Name: tb_doc_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_doc_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_doc_type_id_seq OWNER TO postgres;

--
-- Name: tb_doc_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_doc_type_id_seq OWNED BY public.tb_doc_type.id;


--
-- Name: tb_documents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_documents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 2147483647
    CACHE 1;


ALTER TABLE public.tb_documents_id_seq OWNER TO postgres;

--
-- Name: tb_documents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_documents (
    id integer DEFAULT nextval('public.tb_documents_id_seq'::regclass) NOT NULL,
    title character varying(150),
    number integer,
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
    document_sei character varying(30),
    dispatch_sei character varying(30),
    process_sei character varying(30),
    filename_doc_final character varying(100),
    observation character varying(500)
);


ALTER TABLE public.tb_documents OWNER TO postgres;

--
-- Name: tb_macroprocess; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_macroprocess (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    number bigint NOT NULL,
    id_proc_type bigint
);


ALTER TABLE public.tb_macroprocess OWNER TO postgres;

--
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_macroprocess_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_macroprocess_id_seq OWNER TO postgres;

--
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_macroprocess_id_seq OWNED BY public.tb_macroprocess.id;


--
-- Name: tb_process; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_process (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    number bigint NOT NULL,
    id_macroprocess bigint,
    status character varying(2)
);


ALTER TABLE public.tb_process OWNER TO postgres;

--
-- Name: tb_process_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_process_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_process_id_seq OWNER TO postgres;

--
-- Name: tb_process_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_process_id_seq OWNED BY public.tb_process.id;


--
-- Name: tb_process_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_process_type (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    initials character varying(2) NOT NULL
);


ALTER TABLE public.tb_process_type OWNER TO postgres;

--
-- Name: tb_process_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_process_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_process_type_id_seq OWNER TO postgres;

--
-- Name: tb_process_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_process_type_id_seq OWNED BY public.tb_process_type.id;


--
-- Name: tb_sector_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_sector_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_sector_id_seq OWNER TO postgres;

--
-- Name: tb_sector_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_sector_id_seq OWNED BY public.tb_area.id;


--
-- Name: tb_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_user (
    codigo bigint NOT NULL,
    usuario character varying(50) NOT NULL,
    senha character varying(120) NOT NULL,
    permissao smallint NOT NULL
);


ALTER TABLE public.tb_user OWNER TO postgres;

--
-- Name: tb_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_user_id_seq OWNER TO postgres;

--
-- Name: tb_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_user_id_seq OWNED BY public.tb_user.codigo;


--
-- Name: tb_area id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_area ALTER COLUMN id SET DEFAULT nextval('public.tb_sector_id_seq'::regclass);


--
-- Name: tb_doc_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type ALTER COLUMN id SET DEFAULT nextval('public.tb_doc_type_id_seq'::regclass);


--
-- Name: tb_macroprocess id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess ALTER COLUMN id SET DEFAULT nextval('public.tb_macroprocess_id_seq'::regclass);


--
-- Name: tb_process id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process ALTER COLUMN id SET DEFAULT nextval('public.tb_process_id_seq'::regclass);


--
-- Name: tb_process_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process_type ALTER COLUMN id SET DEFAULT nextval('public.tb_process_type_id_seq'::regclass);


--
-- Name: tb_user codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user ALTER COLUMN codigo SET DEFAULT nextval('public.tb_user_id_seq'::regclass);


--
-- Data for Name: tb_area; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_area (id, initials, name) VALUES (2, 'AUDIT', 'Auditoria Interna HU-UFSCar');
INSERT INTO public.tb_area (id, initials, name) VALUES (3, 'OUVID', 'Ouvidoria HU UFSCar');
INSERT INTO public.tb_area (id, initials, name) VALUES (4, 'PRTC', 'Protocolo HU UFSCar');
INSERT INTO public.tb_area (id, initials, name) VALUES (5, 'GA', 'Gerencia Administrativa');
INSERT INTO public.tb_area (id, initials, name) VALUES (6, 'GAS', 'Gerencia de Atenção à Saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (7, 'GEP', 'Gerencia de Ensino e Pesquisa');
INSERT INTO public.tb_area (id, initials, name) VALUES (8, 'DAF', 'Divisão Administrativo Financeiro');
INSERT INTO public.tb_area (id, initials, name) VALUES (10, 'DGC', 'Divisão de Gestão do Cuidado');
INSERT INTO public.tb_area (id, initials, name) VALUES (11, 'DIVGP', 'Divisão de Gestão de Pessoas');
INSERT INTO public.tb_area (id, initials, name) VALUES (12, 'DM', 'Divisão Médica');
INSERT INTO public.tb_area (id, initials, name) VALUES (13, 'SA', 'Setor de Administração');
INSERT INTO public.tb_area (id, initials, name) VALUES (14, 'SADT', 'Setor de Apoio Diagnóstico e Terapêutico');
INSERT INTO public.tb_area (id, initials, name) VALUES (15, 'SAGAS', 'Setor de Apoio à Gestão da Atenção à Saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (16, 'SCA', 'Setor do Cuidado Assistencial');
INSERT INTO public.tb_area (id, initials, name) VALUES (17, 'SFH', 'Setor de Farmácia Hospitalar');
INSERT INTO public.tb_area (id, initials, name) VALUES (18, 'SGE', 'Setor de Gestão do Ensino');
INSERT INTO public.tb_area (id, initials, name) VALUES (19, 'SGPIT', 'Setor de Gestão da Pesquisa e Inovação Tecnológica');
INSERT INTO public.tb_area (id, initials, name) VALUES (20, 'SGPTI', 'Setor de Gestão de Processos e Tecnologia da Informação');
INSERT INTO public.tb_area (id, initials, name) VALUES (21, 'SGQSP', 'Setor de Gestão da Qualidade e Segurança do Paciente');
INSERT INTO public.tb_area (id, initials, name) VALUES (22, 'SIF', 'Setor de Infraestrutura Física');
INSERT INTO public.tb_area (id, initials, name) VALUES (23, 'SJ', 'Setor Jurídico');
INSERT INTO public.tb_area (id, initials, name) VALUES (24, 'SL', 'Setor de Logística');
INSERT INTO public.tb_area (id, initials, name) VALUES (25, 'SOFC', 'Setor de Orçamentos, Finanças e Controladoria');
INSERT INTO public.tb_area (id, initials, name) VALUES (26, 'SRIA', 'Setor de Regulação e Informação Assistencial');
INSERT INTO public.tb_area (id, initials, name) VALUES (27, 'UAC', 'Unidade de Apoio Corporativo');
INSERT INTO public.tb_area (id, initials, name) VALUES (28, 'UAF', 'Unidade de Abastecimento Farmacêutico');
INSERT INTO public.tb_area (id, initials, name) VALUES (29, 'UAGE', 'Unidade de Apoio a Gestão da Enfermagem');
INSERT INTO public.tb_area (id, initials, name) VALUES (30, 'UALCA', 'Unidade de Atenção à Linha do Cuidado Adulto');
INSERT INTO public.tb_area (id, initials, name) VALUES (31, 'UALCP', 'Unidade de Anteção à Linha do Cuidado Psicossocial');
INSERT INTO public.tb_area (id, initials, name) VALUES (32, 'UAO', 'Unidade de Apoio Operacional');
INSERT INTO public.tb_area (id, initials, name) VALUES (33, 'UAP', 'Unidade de Administração de Pessoal');
INSERT INTO public.tb_area (id, initials, name) VALUES (34, 'UASCA', 'Unidade de Atenção à Linha do Cuidado da Saúde da Criança e do Adolescente');
INSERT INTO public.tb_area (id, initials, name) VALUES (35, 'UC', 'Unidade de Cirurgia/RPA e CME');
INSERT INTO public.tb_area (id, initials, name) VALUES (36, 'UCC', 'Unidade de Compras e Contratos');
INSERT INTO public.tb_area (id, initials, name) VALUES (37, 'UCC', 'Unidade de Contabilidade de Custos');
INSERT INTO public.tb_area (id, initials, name) VALUES (38, 'UCF', 'Unidade de Contabilidade Fiscal');
INSERT INTO public.tb_area (id, initials, name) VALUES (39, 'UCS', 'Unidade de Comunicação Social');
INSERT INTO public.tb_area (id, initials, name) VALUES (40, 'UDI', 'Unidade de Diagnóstico por Imagem');
INSERT INTO public.tb_area (id, initials, name) VALUES (41, 'UDP', 'Unidade de Desenvolvimento de Pessoas');
INSERT INTO public.tb_area (id, initials, name) VALUES (42, 'UEC', 'Unidade de Engenharia Clínica');
INSERT INTO public.tb_area (id, initials, name) VALUES (43, 'UES', 'Unidade de e-saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (44, 'UFCDF', 'Unidade de Farmácia Clínica e Dispensação Farmacêutica');
INSERT INTO public.tb_area (id, initials, name) VALUES (45, 'UGAGET', 'Unidade de Gerenciamento de Atividades de Graduação e Ensino Técnico');
INSERT INTO public.tb_area (id, initials, name) VALUES (46, 'UGAPG', 'Unidade de Gerenciamento de Atividades de Pós Graduação');
INSERT INTO public.tb_area (id, initials, name) VALUES (47, 'UGQ', 'Unidade de Gestão da Qualidade');
INSERT INTO public.tb_area (id, initials, name) VALUES (48, 'UH', 'Unidade de Hotelaria');
INSERT INTO public.tb_area (id, initials, name) VALUES (49, 'UIC', 'Unidade de Infraestrutura de Comunicação');
INSERT INTO public.tb_area (id, initials, name) VALUES (50, 'UL', 'Unidade de Licitações');
INSERT INTO public.tb_area (id, initials, name) VALUES (51, 'ULACAP', 'Unidade de Laboratório de Análises Clínicas e Anatomia Patológica');
INSERT INTO public.tb_area (id, initials, name) VALUES (52, 'ULD', 'Unidade de Liquidação da Despesa');
INSERT INTO public.tb_area (id, initials, name) VALUES (53, 'UNAPS', 'Unidade de Abastecimento de Produtos para Saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (54, 'UNC', 'Unidade de Nutrição Clínica');
INSERT INTO public.tb_area (id, initials, name) VALUES (55, 'UNIAL', 'Unidade de Almoxarifado');
INSERT INTO public.tb_area (id, initials, name) VALUES (56, 'UNIPA', 'Unidade de Patrimonio');
INSERT INTO public.tb_area (id, initials, name) VALUES (57, 'UP', 'Unidade de Planejamento');
INSERT INTO public.tb_area (id, initials, name) VALUES (58, 'UPD', 'Unidade de Pagamento da Despesa');
INSERT INTO public.tb_area (id, initials, name) VALUES (59, 'UPIAMA', 'Unidade de Processamento das Informações Assistenciais, Monitoramento e Avaliação');
INSERT INTO public.tb_area (id, initials, name) VALUES (60, 'URA', 'Unidade de Regulação Assistencial');
INSERT INTO public.tb_area (id, initials, name) VALUES (61, 'URE', 'Unidade de Reabilitação');
INSERT INTO public.tb_area (id, initials, name) VALUES (62, 'USP', 'Unidade de Segurança do Paciente');
INSERT INTO public.tb_area (id, initials, name) VALUES (63, 'USS', 'Unidade de Simulação em Saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (64, 'UVS', 'Unidade de Vigilância em Saúde');
INSERT INTO public.tb_area (id, initials, name) VALUES (1, 'SUP', 'Superintendência');
INSERT INTO public.tb_area (id, initials, name) VALUES (9, 'DENF', 'Divisão de Enfermagem');


--
-- Data for Name: tb_doc_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (14, 'Lista Mestra de Documentos', 3, 'LMD', 0);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (13, 'Documentos Externos', 3, 'DEX', 0);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (17, 'Registro da Qualidade', 3, 'REQ', 0);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (5, 'Política Institucional', 1, 'POL', 4);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (7, 'Regimento', 1, 'REG', 4);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (9, 'Regulamento', 1, 'RGL', 4);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (15, 'Procedimento Operacional Padrão / Rotina', 3, 'POP', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (2, 'Diretriz', 1, 'DRT', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (3, 'Manual', 1, 'MAN', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (4, 'Norma', 1, 'NOR', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (6, 'Programa', 1, 'PRO', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (8, 'Fluxograma', 2, 'FLU', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (10, 'Mapeamento de Processos', 2, 'MAP', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (11, 'Plano', 2, 'PLA', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (12, 'Protocolo', 2, 'PTC', 2);
INSERT INTO public.tb_doc_type (id, name, level, initials, max_rev_period) VALUES (1, 'Cadeia de Valor', 1, 'CDV', 2);


--
-- Data for Name: tb_documents; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (115, '1', 1, 1, 5, 3, 'a', 'a', 'a', 'a', '2020-08-03 00:00:00-03', 'A', '3', 8, '2020-08-07 20:37:09.292282-03', NULL, 'MAN.SUP.PG0301.001', 'MAN.SUP.PG0301.001.docx', 'MAN.SUP.PG0301.001.', 'user', 'N', '', '', '', 'MAN.SUP.PG0301.001.', NULL);
INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (116, 'Doc 03', 1, 3, 6, 3, 'a', 'a', 'a', 'a', '2020-08-07 00:00:00-03', 'A', '2', 4, '2020-08-08 16:20:20.863208-03', NULL, 'NOR.GAS.PA0903.001', 'NOR.GAS.PA0903.001.', NULL, 'admin', 'N', 'a', 'a', 'a', NULL, NULL);
INSERT INTO public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, document_sei, dispatch_sei, process_sei, filename_doc_final, observation) VALUES (117, 'Doc 05', 1, 2, 8, 1, 'a', 'a', 'a', 'a', '2020-08-05 00:00:00-03', 'A', '1', 7, '2020-08-08 16:26:15.135215-03', NULL, 'REG.DAF.PA0902.001', 'REG.DAF.PA0902.001.', 'REG.DAF.PG0301.001.', 'admin', 'R', '', '', '', 'REG.DAF.PG0301.001.', NULL);


--
-- Data for Name: tb_macroprocess; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (5, 'Gerir estratégia institucional', 2, 1);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (6, 'Gerir qualidade institucional', 3, 1);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (7, 'Realizar atendimento de urgência e emergência', 1, 2);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (8, 'Realizar internação', 2, 2);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (9, 'Realizar atendimento ambulatorial', 5, 2);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (10, 'Realizar exames', 3, 2);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (11, 'Gerir ensino, pesquisa e extensão', 4, 2);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (12, 'Gerir segurança do trabalhador', 17, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (14, 'Gerir infraestrutura física e tecnológica', 9, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (15, 'Gerir logística e suprimentos', 10, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (16, 'Gerir pessoas', 11, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (17, 'Gerir nutrição', 15, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (19, 'Gerir consultoria jurídica', 18, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (20, 'Processar produtos para saúde (CME)', 6, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (23, 'Gerir processos administrativo financeira', 12, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (24, 'Gerir farmácia hospitalar', 14, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (25, 'Gerir patrimônio', 1, 3);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (1, 'Realizar Atividades de Ouvidoria', 1, 1);
INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (13, 'Gerir hotelaria hospitalar', 5, 3);


--
-- Data for Name: tb_process; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (1, 'Gerir documentos institucionais', 1, 6, 'P');
INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (2, 'Gerir projetos e obras', 2, 14, 'P');
INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (4, 'Gerir contingências de infraestrutura física', 6, 14, 'P');
INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (5, 'Triar e investigar eventos adversos', 7, 6, 'P');
INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (3, 'Gerir manutenção predial', 3, 14, 'P');
INSERT INTO public.tb_process (id, name, number, id_macroprocess, status) VALUES (8, 'Testando CRUD outra vez aaa', 15, 11, 'P');


--
-- Data for Name: tb_process_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_process_type (id, name, initials) VALUES (1, 'Processos Gerenciais', 'PG');
INSERT INTO public.tb_process_type (id, name, initials) VALUES (2, 'Processos Finalísticos', 'PF');
INSERT INTO public.tb_process_type (id, name, initials) VALUES (3, 'Processos de Apoio', 'PA');


--
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_user (codigo, usuario, senha, permissao) VALUES (1, 'admin', '$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa', 1);
INSERT INTO public.tb_user (codigo, usuario, senha, permissao) VALUES (2, 'user', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);
INSERT INTO public.tb_user (codigo, usuario, senha, permissao) VALUES (3, 'leandro', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);


--
-- Name: tb_doc_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_doc_type_id_seq', 25, true);


--
-- Name: tb_documents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_documents_id_seq', 117, true);


--
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_macroprocess_id_seq', 33, true);


--
-- Name: tb_process_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_process_id_seq', 8, true);


--
-- Name: tb_process_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_process_type_id_seq', 5, true);


--
-- Name: tb_sector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_sector_id_seq', 72, true);


--
-- Name: tb_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_user_id_seq', 2, true);


--
-- Name: tb_area tb_area_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_area
    ADD CONSTRAINT tb_area_pkey PRIMARY KEY (id);


--
-- Name: tb_doc_type tb_doc_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type
    ADD CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id);


--
-- Name: tb_documents tb_documents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_pkey PRIMARY KEY (id);


--
-- Name: tb_macroprocess tb_macroprocess_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_pkey PRIMARY KEY (id);


--
-- Name: tb_process tb_process_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process
    ADD CONSTRAINT tb_process_pkey PRIMARY KEY (id);


--
-- Name: tb_process_type tb_process_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process_type
    ADD CONSTRAINT tb_process_type_pkey PRIMARY KEY (id);


--
-- Name: tb_user usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (codigo);


--
-- Name: fki_tb_documents_id_area_fkey; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_tb_documents_id_area_fkey ON public.tb_documents USING btree (area);


--
-- Name: fki_tb_documents_id_process_fkey; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_tb_documents_id_process_fkey ON public.tb_documents USING btree (process);


--
-- Name: tb_documents tb_documents_id_area_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_area_fkey FOREIGN KEY (area) REFERENCES public.tb_area(id);


--
-- Name: tb_documents tb_documents_id_doc_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_doc_type_fkey FOREIGN KEY (doc_type) REFERENCES public.tb_doc_type(id);


--
-- Name: tb_documents tb_documents_id_process_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_process_fkey FOREIGN KEY (process) REFERENCES public.tb_process(id);


--
-- Name: tb_macroprocess tb_macroprocess_id_proc_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_id_proc_type_fkey FOREIGN KEY (id_proc_type) REFERENCES public.tb_process_type(id);


--
-- Name: tb_process tb_process_id_macroprocess_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process
    ADD CONSTRAINT tb_process_id_macroprocess_fkey FOREIGN KEY (id_macroprocess) REFERENCES public.tb_macroprocess(id);


--
-- PostgreSQL database dump complete
--

