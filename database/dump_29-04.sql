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

DROP DATABASE projeto_db;
--
-- Name: projeto_db; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE projeto_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


ALTER DATABASE projeto_db OWNER TO postgres;

\connect projeto_db

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
-- Name: tb_doc_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_doc_type (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    level bigint,
    initials character varying(3)
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
-- Name: tb_sector; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_sector (
    id integer NOT NULL,
    initials character varying(10),
    name character varying(200)
);


ALTER TABLE public.tb_sector OWNER TO postgres;

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

ALTER SEQUENCE public.tb_sector_id_seq OWNED BY public.tb_sector.id;


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
-- Name: tb_doc_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type ALTER COLUMN id SET DEFAULT nextval('public.tb_doc_type_id_seq'::regclass);


--
-- Name: tb_macroprocess id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess ALTER COLUMN id SET DEFAULT nextval('public.tb_macroprocess_id_seq'::regclass);


--
-- Name: tb_process_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process_type ALTER COLUMN id SET DEFAULT nextval('public.tb_process_type_id_seq'::regclass);


--
-- Name: tb_sector id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_sector ALTER COLUMN id SET DEFAULT nextval('public.tb_sector_id_seq'::regclass);


--
-- Name: tb_user codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user ALTER COLUMN codigo SET DEFAULT nextval('public.tb_user_id_seq'::regclass);


--
-- Data for Name: tb_doc_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (14, 'Lista Mestra de Documentos', 3, 'LMD');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (15, 'Procedimento Operacional Padrão / Rotina', 3, 'POP');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (17, 'Registro da Qualidade', 3, 'REQ');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (1, 'Cadeia de Valor', 1, 'CDV');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (2, 'Diretriz', 1, 'DRT');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (3, 'Manual', 1, 'MAN');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (4, 'Norma', 1, 'NOR');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (5, 'Política Institucional', 1, 'POL');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (6, 'Programa', 1, 'PRO');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (7, 'Regimento', 1, 'REG');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (8, 'Fluxograma', 2, 'FLU');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (9, 'Regulamento', 1, 'RGL');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (10, 'Mapeamento de Processos', 2, 'MAP');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (11, 'Plano', 2, 'PLA');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (12, 'Protocolo', 2, 'PTC');
INSERT INTO public.tb_doc_type (id, name, level, initials) VALUES (13, 'Documentos Externos', 3, 'DEX');


--
-- Data for Name: tb_macroprocess; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_macroprocess (id, name, number, id_proc_type) VALUES (1, 'Realizar Atividades de Ouvidoria', 1, 1);


--
-- Data for Name: tb_process_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_process_type (id, name, initials) VALUES (1, 'Macroprocessos Gerenciais', 'PG');
INSERT INTO public.tb_process_type (id, name, initials) VALUES (2, 'Macroprocessos Finalísticos', 'PF');
INSERT INTO public.tb_process_type (id, name, initials) VALUES (3, 'Macroprocessos de Apoio', 'PA');


--
-- Data for Name: tb_sector; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_sector (id, initials, name) VALUES (1, 'SUP', 'Superintendência');
INSERT INTO public.tb_sector (id, initials, name) VALUES (2, 'AUDIT', 'Auditoria Interna HU-UFSCar');
INSERT INTO public.tb_sector (id, initials, name) VALUES (3, 'OUVID', 'Ouvidoria HU UFSCar');
INSERT INTO public.tb_sector (id, initials, name) VALUES (4, 'PRTC', 'Protocolo HU UFSCar');
INSERT INTO public.tb_sector (id, initials, name) VALUES (5, 'GA', 'Gerencia Administrativa');
INSERT INTO public.tb_sector (id, initials, name) VALUES (6, 'GAS', 'Gerencia de Atenção à Saúde');
INSERT INTO public.tb_sector (id, initials, name) VALUES (7, 'GEP', 'Gerencia de Ensino e Pesquisa');
INSERT INTO public.tb_sector (id, initials, name) VALUES (8, 'DAF', 'Divisão Administrativo Financeiro');
INSERT INTO public.tb_sector (id, initials, name) VALUES (9, 'DENF', 'Divisão de Enfermagem');
INSERT INTO public.tb_sector (id, initials, name) VALUES (10, 'DGC', 'Divisão de Gestão do Cuidado');
INSERT INTO public.tb_sector (id, initials, name) VALUES (11, 'DIVGP', 'Divisão de Gestão de Pessoas');
INSERT INTO public.tb_sector (id, initials, name) VALUES (12, 'DM', 'Divisão Médica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (13, 'SA', 'Setor de Administração');
INSERT INTO public.tb_sector (id, initials, name) VALUES (14, 'SADT', 'Setor de Apoio Diagnóstico e Terapêutico');
INSERT INTO public.tb_sector (id, initials, name) VALUES (15, 'SAGAS', 'Setor de Apoio à Gestão da Atenção à Saúde');
INSERT INTO public.tb_sector (id, initials, name) VALUES (16, 'SCA', 'Setor do Cuidado Assistencial');
INSERT INTO public.tb_sector (id, initials, name) VALUES (17, 'SFH', 'Setor de Farmácia Hospitalar');
INSERT INTO public.tb_sector (id, initials, name) VALUES (18, 'SGE', 'Setor de Gestão do Ensino');
INSERT INTO public.tb_sector (id, initials, name) VALUES (19, 'SGPIT', 'Setor de Gestão da Pesquisa e Inovação Tecnológica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (20, 'SGPTI', 'Setor de Gestão de Processos e Tecnologia da Informação');
INSERT INTO public.tb_sector (id, initials, name) VALUES (21, 'SGQSP', 'Setor de Gestão da Qualidade e Segurança do Paciente');
INSERT INTO public.tb_sector (id, initials, name) VALUES (22, 'SIF', 'Setor de Infraestrutura Física');
INSERT INTO public.tb_sector (id, initials, name) VALUES (23, 'SJ', 'Setor Jurídico');
INSERT INTO public.tb_sector (id, initials, name) VALUES (24, 'SL', 'Setor de Logística');
INSERT INTO public.tb_sector (id, initials, name) VALUES (25, 'SOFC', 'Setor de Orçamentos, Finanças e Controladoria');
INSERT INTO public.tb_sector (id, initials, name) VALUES (26, 'SRIA', 'Setor de Regulação e Informação Assistencial');
INSERT INTO public.tb_sector (id, initials, name) VALUES (27, 'UAC', 'Unidade de Apoio Corporativo');
INSERT INTO public.tb_sector (id, initials, name) VALUES (28, 'UAF', 'Unidade de Abastecimento Farmacêutico');
INSERT INTO public.tb_sector (id, initials, name) VALUES (29, 'UAGE', 'Unidade de Apoio a Gestão da Enfermagem');
INSERT INTO public.tb_sector (id, initials, name) VALUES (30, 'UALCA', 'Unidade de Atenção à Linha do Cuidado Adulto');
INSERT INTO public.tb_sector (id, initials, name) VALUES (31, 'UALCP', 'Unidade de Anteção à Linha do Cuidado Psicossocial');
INSERT INTO public.tb_sector (id, initials, name) VALUES (32, 'UAO', 'Unidade de Apoio Operacional');
INSERT INTO public.tb_sector (id, initials, name) VALUES (33, 'UAP', 'Unidade de Administração de Pessoal');
INSERT INTO public.tb_sector (id, initials, name) VALUES (34, 'UASCA', 'Unidade de Atenção à Linha do Cuidado da Saúde da Criança e do Adolescente');
INSERT INTO public.tb_sector (id, initials, name) VALUES (35, 'UC', 'Unidade de Cirurgia/RPA e CME');
INSERT INTO public.tb_sector (id, initials, name) VALUES (36, 'UCC', 'Unidade de Compras e Contratos');
INSERT INTO public.tb_sector (id, initials, name) VALUES (37, 'UCC', 'Unidade de Contabilidade de Custos');
INSERT INTO public.tb_sector (id, initials, name) VALUES (38, 'UCF', 'Unidade de Contabilidade Fiscal');
INSERT INTO public.tb_sector (id, initials, name) VALUES (39, 'UCS', 'Unidade de Comunicação Social');
INSERT INTO public.tb_sector (id, initials, name) VALUES (40, 'UDI', 'Unidade de Diagnóstico por Imagem');
INSERT INTO public.tb_sector (id, initials, name) VALUES (41, 'UDP', 'Unidade de Desenvolvimento de Pessoas');
INSERT INTO public.tb_sector (id, initials, name) VALUES (42, 'UEC', 'Unidade de Engenharia Clínica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (43, 'UES', 'Unidade de e-saúde');
INSERT INTO public.tb_sector (id, initials, name) VALUES (44, 'UFCDF', 'Unidade de Farmácia Clínica e Dispensação Farmacêutica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (45, 'UGAGET', 'Unidade de Gerenciamento de Atividades de Graduação e Ensino Técnico');
INSERT INTO public.tb_sector (id, initials, name) VALUES (46, 'UGAPG', 'Unidade de Gerenciamento de Atividades de Pós Graduação');
INSERT INTO public.tb_sector (id, initials, name) VALUES (47, 'UGQ', 'Unidade de Gestão da Qualidade');
INSERT INTO public.tb_sector (id, initials, name) VALUES (48, 'UH', 'Unidade de Hotelaria');
INSERT INTO public.tb_sector (id, initials, name) VALUES (49, 'UIC', 'Unidade de Infraestrutura de Comunicação');
INSERT INTO public.tb_sector (id, initials, name) VALUES (50, 'UL', 'Unidade de Licitações');
INSERT INTO public.tb_sector (id, initials, name) VALUES (51, 'ULACAP', 'Unidade de Laboratório de Análises Clínicas e Anatomia Patológica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (52, 'ULD', 'Unidade de Liquidação da Despesa');
INSERT INTO public.tb_sector (id, initials, name) VALUES (53, 'UNAPS', 'Unidade de Abastecimento de Produtos para Saúde');
INSERT INTO public.tb_sector (id, initials, name) VALUES (54, 'UNC', 'Unidade de Nutrição Clínica');
INSERT INTO public.tb_sector (id, initials, name) VALUES (55, 'UNIAL', 'Unidade de Almoxarifado');
INSERT INTO public.tb_sector (id, initials, name) VALUES (56, 'UNIPA', 'Unidade de Patrimonio');
INSERT INTO public.tb_sector (id, initials, name) VALUES (57, 'UP', 'Unidade de Planejamento');
INSERT INTO public.tb_sector (id, initials, name) VALUES (58, 'UPD', 'Unidade de Pagamento da Despesa');
INSERT INTO public.tb_sector (id, initials, name) VALUES (59, 'UPIAMA', 'Unidade de Processamento das Informações Assistenciais, Monitoramento e Avaliação');
INSERT INTO public.tb_sector (id, initials, name) VALUES (60, 'URA', 'Unidade de Regulação Assistencial');
INSERT INTO public.tb_sector (id, initials, name) VALUES (61, 'URE', 'Unidade de Reabilitação');
INSERT INTO public.tb_sector (id, initials, name) VALUES (62, 'USP', 'Unidade de Segurança do Paciente');
INSERT INTO public.tb_sector (id, initials, name) VALUES (63, 'USS', 'Unidade de Simulação em Saúde');
INSERT INTO public.tb_sector (id, initials, name) VALUES (64, 'UVS', 'Unidade de Vigilância em Saúde');


--
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_user (codigo, usuario, senha, permissao) VALUES (1, 'admin', '$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa', 1);
INSERT INTO public.tb_user (codigo, usuario, senha, permissao) VALUES (2, 'user', '$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC', 2);


--
-- Name: tb_doc_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_doc_type_id_seq', 18, true);


--
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_macroprocess_id_seq', 4, true);


--
-- Name: tb_process_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_process_type_id_seq', 4, true);


--
-- Name: tb_sector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_sector_id_seq', 65, true);


--
-- Name: tb_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_user_id_seq', 2, true);


--
-- Name: tb_doc_type tb_doc_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type
    ADD CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id);


--
-- Name: tb_macroprocess tb_macroprocess_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_pkey PRIMARY KEY (id);


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
-- Name: tb_macroprocess tb_macroprocess_id_proc_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_id_proc_type_fkey FOREIGN KEY (id_proc_type) REFERENCES public.tb_process_type(id);


--
-- PostgreSQL database dump complete
--

