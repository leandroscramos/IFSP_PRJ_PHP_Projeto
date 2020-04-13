--
-- PostgreSQL database dump
--

-- Dumped from database version 12.1
-- Dumped by pg_dump version 12.1

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
    level bigint
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
-- Name: usuario_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_codigo_seq OWNER TO postgres;

--
-- Name: usuario_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_codigo_seq OWNED BY public.tb_user.codigo;


--
-- Name: tb_doc_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type ALTER COLUMN id SET DEFAULT nextval('public.tb_doc_type_id_seq'::regclass);


--
-- Name: tb_sector id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_sector ALTER COLUMN id SET DEFAULT nextval('public.tb_sector_id_seq'::regclass);


--
-- Name: tb_user codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user ALTER COLUMN codigo SET DEFAULT nextval('public.usuario_codigo_seq'::regclass);


--
-- Data for Name: tb_doc_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_doc_type (id, name, level) FROM stdin;
1	Cadeia de Valor	1
2	Diretriz	1
3	Manual	1
4	Norma	1
5	Política Institucional	1
6	Programa	1
7	Regimento	1
8	Regulamento	1
10	Mapeamento de Processos	2
11	Plano	2
12	Protocolo	2
13	Documentos Externos	3
14	Lista Mestra de Documentos	3
15	Padrão / Rotina	3
16	Procedimento Operacional	3
9	Fluxograma	2
17	Registro da Qualidade	3
\.


--
-- Data for Name: tb_sector; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_sector (id, initials, name) FROM stdin;
1	SUP	Superintendência
2	AUDIT	Auditoria Interna HU-UFSCar
3	OUVID	Ouvidoria HU UFSCar
4	PRTC	Protocolo HU UFSCar
5	GA	Gerencia Administrativa
6	GAS	Gerencia de Atenção à Saúde
7	GEP	Gerencia de Ensino e Pesquisa
8	DAF	Divisão Administrativo Financeiro
9	DENF	Divisão de Enfermagem
11	DIVGP	Divisão de Gestão de Pessoas
12	DM	Divisão Médica
13	SA	Setor de Administração
14	SADT	Setor de Apoio Diagnóstico e Terapêutico
15	SAGAS	Setor de Apoio à Gestão da Atenção à Saúde
16	SCA	Setor do Cuidado Assistencial
17	SFH	Setor de Farmácia Hospitalar
18	SGE	Setor de Gestão do Ensino
19	SGPIT	Setor de Gestão da Pesquisa e Inovação Tecnológica
20	SGPTI	Setor de Gestão de Processos e Tecnologia da Informação
21	SGQSP	Setor de Gestão da Qualidade e Segurança do Paciente
22	SIF	Setor de Infraestrutura Física
23	SJ	Setor Jurídico
24	SL	Setor de Logística
25	SOFC	Setor de Orçamentos, Finanças e Controladoria
26	SRIA	Setor de Regulação e Informação Assistencial
27	UAC	Unidade de Apoio Corporativo
28	UAF	Unidade de Abastecimento Farmacêutico
29	UAGE	Unidade de Apoio a Gestão da Enfermagem
30	UALCA	Unidade de Atenção à Linha do Cuidado Adulto
31	UALCP	Unidade de Anteção à Linha do Cuidado Psicossocial
32	UAO	Unidade de Apoio Operacional
33	UAP	Unidade de Administração de Pessoal
34	UASCA	Unidade de Atenção à Linha do Cuidado da Saúde da Criança e do Adolescente
35	UC	Unidade de Cirurgia/RPA e CME
36	UCC	Unidade de Compras e Contratos
37	UCC	Unidade de Contabilidade de Custos
38	UCF	Unidade de Contabilidade Fiscal
39	UCS	Unidade de Comunicação Social
40	UDI	Unidade de Diagnóstico por Imagem
41	UDP	Unidade de Desenvolvimento de Pessoas
45	UGAGET	Unidade de Gerenciamento de Atividades de Graduação e Ensino Técnico
46	UGAPG	Unidade de Gerenciamento de Atividades de Pós Graduação
47	UGQ	Unidade de Gestão da Qualidade
48	UH	Unidade de Hotelaria
49	UIC	Unidade de Infraestrutura de Comunicação
50	UL	Unidade de Licitações
51	ULACAP	Unidade de Laboratório de Análises Clínicas e Anatomia Patológica
52	ULD	Unidade de Liquidação da Despesa
53	UNAPS	Unidade de Abastecimento de Produtos para Saúde
54	UNC	Unidade de Nutrição Clínica
55	UNIAL	Unidade de Almoxarifado
56	UNIPA	Unidade de Patrimonio
57	UP	Unidade de Planejamento
58	UPD	Unidade de Pagamento da Despesa
59	UPIAMA	Unidade de Processamento das Informações Assistenciais, Monitoramento e Avaliação
60	URA	Unidade de Regulação Assistencial
61	URE	Unidade de Reabilitação
62	USP	Unidade de Segurança do Paciente
63	USS	Unidade de Simulação em Saúde
64	UVS	Unidade de Vigilância em Saúde
42	UEC	Unidade de Engenharia Clínica
43	UES	Unidade de e-saúde
44	UFCDF	Unidade de Farmácia Clínica e Dispensação Farmacêutica
10	DGC	Divisão de Gestão do Cuidado
\.


--
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_user (codigo, usuario, senha, permissao) FROM stdin;
1	admin	$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa	1
2	user	$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC	2
\.


--
-- Name: tb_doc_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_doc_type_id_seq', 17, true);


--
-- Name: tb_sector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_sector_id_seq', 64, true);


--
-- Name: usuario_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_codigo_seq', 2, true);


--
-- Name: tb_doc_type tb_doc_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type
    ADD CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id);


--
-- Name: tb_user usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (codigo);


--
-- PostgreSQL database dump complete
--

