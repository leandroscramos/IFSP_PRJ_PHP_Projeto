--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.2

-- Started on 2020-08-17 17:43:16

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
-- TOC entry 210 (class 1259 OID 16414)
-- Name: tb_area; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_area (
    id integer NOT NULL,
    initials character varying(10),
    name character varying(200)
);


ALTER TABLE public.tb_area OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16394)
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
-- TOC entry 203 (class 1259 OID 16397)
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
-- TOC entry 2895 (class 0 OID 0)
-- Dependencies: 203
-- Name: tb_doc_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_doc_type_id_seq OWNED BY public.tb_doc_type.id;


--
-- TOC entry 214 (class 1259 OID 16453)
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
-- TOC entry 215 (class 1259 OID 16482)
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
    process_sei character varying(30),
    document_sei character varying(30),
    dispatch_sei character varying(30),
    filename_doc_final character varying(100),
    observation character varying(1000)
);


ALTER TABLE public.tb_documents OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16399)
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
-- TOC entry 205 (class 1259 OID 16402)
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
-- TOC entry 2896 (class 0 OID 0)
-- Dependencies: 205
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_macroprocess_id_seq OWNED BY public.tb_macroprocess.id;


--
-- TOC entry 206 (class 1259 OID 16404)
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
-- TOC entry 207 (class 1259 OID 16407)
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
-- TOC entry 2897 (class 0 OID 0)
-- Dependencies: 207
-- Name: tb_process_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_process_id_seq OWNED BY public.tb_process.id;


--
-- TOC entry 208 (class 1259 OID 16409)
-- Name: tb_process_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_process_type (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    initials character varying(2) NOT NULL
);


ALTER TABLE public.tb_process_type OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16412)
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
-- TOC entry 2898 (class 0 OID 0)
-- Dependencies: 209
-- Name: tb_process_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_process_type_id_seq OWNED BY public.tb_process_type.id;


--
-- TOC entry 211 (class 1259 OID 16417)
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
-- TOC entry 2899 (class 0 OID 0)
-- Dependencies: 211
-- Name: tb_sector_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_sector_id_seq OWNED BY public.tb_area.id;


--
-- TOC entry 212 (class 1259 OID 16419)
-- Name: tb_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_user (
    codigo bigint NOT NULL,
    usuario character varying(50) NOT NULL,
    senha character varying(120) NOT NULL,
    permissao smallint NOT NULL,
    nome character varying(100)
);


ALTER TABLE public.tb_user OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 16422)
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
-- TOC entry 2900 (class 0 OID 0)
-- Dependencies: 213
-- Name: tb_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_user_id_seq OWNED BY public.tb_user.codigo;


--
-- TOC entry 2728 (class 2604 OID 16428)
-- Name: tb_area id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_area ALTER COLUMN id SET DEFAULT nextval('public.tb_sector_id_seq'::regclass);


--
-- TOC entry 2724 (class 2604 OID 16424)
-- Name: tb_doc_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type ALTER COLUMN id SET DEFAULT nextval('public.tb_doc_type_id_seq'::regclass);


--
-- TOC entry 2725 (class 2604 OID 16425)
-- Name: tb_macroprocess id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess ALTER COLUMN id SET DEFAULT nextval('public.tb_macroprocess_id_seq'::regclass);


--
-- TOC entry 2726 (class 2604 OID 16426)
-- Name: tb_process id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process ALTER COLUMN id SET DEFAULT nextval('public.tb_process_id_seq'::regclass);


--
-- TOC entry 2727 (class 2604 OID 16427)
-- Name: tb_process_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process_type ALTER COLUMN id SET DEFAULT nextval('public.tb_process_type_id_seq'::regclass);


--
-- TOC entry 2729 (class 2604 OID 16429)
-- Name: tb_user codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user ALTER COLUMN codigo SET DEFAULT nextval('public.tb_user_id_seq'::regclass);


--
-- TOC entry 2884 (class 0 OID 16414)
-- Dependencies: 210
-- Data for Name: tb_area; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_area (id, initials, name) FROM stdin;
1	SUP	Superintendência
2	AUDIT	Auditoria Interna HU-UFSCar
3	OUVID	Ouvidoria HU UFSCar
4	PRTC	Protocolo HU UFSCar
5	GA	Gerencia Administrativa
6	GAS	Gerencia de Atenção à Saúde
7	GEP	Gerencia de Ensino e Pesquisa
8	DAF	Divisão Administrativo Financeiro
9	DENF	Divisão de Enfermagem
10	DGC	Divisão de Gestão do Cuidado
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
42	UEC	Unidade de Engenharia Clínica
43	UES	Unidade de e-saúde
44	UFCDF	Unidade de Farmácia Clínica e Dispensação Farmacêutica
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
\.


--
-- TOC entry 2876 (class 0 OID 16394)
-- Dependencies: 202
-- Data for Name: tb_doc_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_doc_type (id, name, level, initials, max_rev_period) FROM stdin;
14	Lista Mestra de Documentos	3	LMD	0
13	Documentos Externos	3	DEX	0
17	Registro da Qualidade	3	REQ	0
5	Política Institucional	1	POL	4
7	Regimento	1	REG	4
9	Regulamento	1	RGL	4
15	Procedimento Operacional Padrão / Rotina	3	POP	2
1	Cadeia de Valor	1	CDV	2
2	Diretriz	1	DRT	2
3	Manual	1	MAN	2
4	Norma	1	NOR	2
6	Programa	1	PRO	2
8	Fluxograma	2	FLU	2
10	Mapeamento de Processos	2	MAP	2
11	Plano	2	PLA	2
12	Protocolo	2	PTC	2
\.


--
-- TOC entry 2889 (class 0 OID 16482)
-- Dependencies: 215
-- Data for Name: tb_documents; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_documents (id, title, number, version, area, process, maker, reviewer, validator, approver, approval_date, situation, status, doc_type, created_at, updated_at, code, filename_doc_sub, filename_pdf_final, submit_user, submit_type, process_sei, document_sei, dispatch_sei, filename_doc_final, observation) FROM stdin;
24	Doc 01	1	1	1	1	Leandro	Leandro	Leandro	Leandro	2020-08-01 00:00:00-03	A	3	3	2020-08-17 10:09:40.274915-03	\N	MAN.SUP.PG0301.001	MAN.SUP.PG0301.001.docx	MAN.SUP.PG0301.001.pdf	user	N				MAN.SUP.PG0301.001.docx	\N
\.


--
-- TOC entry 2878 (class 0 OID 16399)
-- Dependencies: 204
-- Data for Name: tb_macroprocess; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_macroprocess (id, name, number, id_proc_type) FROM stdin;
1	Realizar Atividades de Ouvidoria	1	1
5	Gerir estratégia institucional	2	1
6	Gerir qualidade institucional	3	1
7	Realizar atendimento de urgência e emergência	1	2
8	Realizar internação	2	2
9	Realizar atendimento ambulatorial	5	2
10	Realizar exames	3	2
11	Gerir ensino, pesquisa e extensão	4	2
12	Gerir segurança do trabalhador	17	3
13	Gerir hotelaria hospitalar	5	3
14	Gerir infraestrutura física e tecnológica	9	3
15	Gerir logística e suprimentos	10	3
16	Gerir pessoas	11	3
17	Gerir nutrição	15	3
19	Gerir consultoria jurídica	18	3
20	Processar produtos para saúde (CME)	6	3
21	Gerir tecnologia de informação e processos	13	3
22	Gerir atividades de regulação	7	3
23	Gerir processos administrativo financeira	12	3
24	Gerir farmácia hospitalar	14	3
25	Gerir patrimônio	1	3
\.


--
-- TOC entry 2880 (class 0 OID 16404)
-- Dependencies: 206
-- Data for Name: tb_process; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_process (id, name, number, id_macroprocess, status) FROM stdin;
66	Realizar ativação de EMH	7	14	P
67	Desenvolver cronograma de manutenção programada de EMH	8	14	P
68	Realizar manutenção programada de EMH	9	14	P
69	Desativar EMH	10	14	P
70	Realizar inventário de EMH	11	14	P
72	Receber insumos	1	15	C
4	Gerir contingências de infraestrutura física	6	14	P
6	Gerir demandas da ouvidoria	1	1	P
7	Avaliar satisfação	2	1	C
74	Planejar inclusão de materiais no elenco	7	15	P
8	Gerir planejamento estratégico	1	5	C
9	Gerir estrutura organizacional	2	5	P
10	Gerir política, diretrizes e normas	3	5	C
11	Gerir comitês, comissões e grupos de trabalho	4	5	C
13	Gerir vigilância epidemiológica	3	6	C
75	Controlar estoque de insumos	2	15	C
12	Realizar auditoria interna da qualidade	2	6	C
76	Gerir contingência de insumos	3	15	C
1	Gerir documentos institucionais	1	6	P
14	Gerir segurança do paciente	4	6	C
15	Gerir controle de infecção	5	6	C
16	Gerir óbitos	6	6	C
17	Triar e investigar eventos adversos	7	6	P
18	Receber paciente	1	7	C
19	Classificar risco	2	7	C
20	Atender paciente	3	7	C
21	Realizar alta hospitalar	4	7	C
22	Receber paciente ambulatorial	1	9	C
23	Atender paciente ambulatorial	2	9	C
24	Realizar alta ambulatorial	3	9	C
25	Realizar atividades de promoção à saúde	5	9	C
27	Processar exames laboratoriais	1	10	P
28	Processar exames de imagem	2	10	C
29	Processar exames de métodos gráficos	3	10	C
30	Executar rotina laboratorial	4	10	C
31	Admitir na internação	1	8	C
32	Realizar cuidado médico	2	8	C
33	Realizar cuidado de enfermagem	3	8	C
34	Realizar cuidado multiprofissional	4	8	C
35	Submeter e aprovar atividades de ensino de graduação, técnico e tecnólogo	1	11	P
36	Acompanhar e finalizar as atividades de ensino de gradução, técnico e tecnólogo	2	11	P
37	Submeter e aprovar atividades de ensino de pós graduação	3	11	C
38	Acompanhar e finalizar atividades de ensino de pós graduação	4	11	C
39	Submeter e aprovar projetos de pesquisa 	5	11	C
40	Acompanhar e finalizar projetos de pesquisa	6	11	C
41	Submeter e aprovar atividades de extensão, residência ou pós graduação	7	11	P
42	Acompanhar e finalizar atividades de extensão, residência ou pós graduação	8	11	P
43	Agendar atividades de simulação	9	11	C
44	Preparar e montar simulação	10	11	C
45	Desmontar simulação	11	11	C
46	Submeter e aprovar capacitaçãoes de público externo na USS	13	11	C
47	Submeter e aprovar resumos	13	11	C
48	Gerir atividades de e-Saúde	15	11	P
49	Agendar e realizar teleconsulta	16	11	P
50	Atuar em incêndio	1	12	P
51	Comunicar e acompanhar acidente de trabalho	2	12	C
52	Gerir afastamentos de saúde	3	12	C
53	Gerir estoque de material de limpeza e higiene	1	13	C
54	Realizar higienização hospitalar	2	13	C
55	Remover enxoval sujo	5	13	C
56	Receber e distribuir enxoval limpo	6	13	C
57	Realizar inventário de enxoval	7	13	C
58	Descartar resíduos comuns e infectantes A1 e A4	8	13	C
59	Descartar pilhas e baterias	9	13	C
60	Prover dietas	10	13	C
61	Gerir projetos e obras	2	14	P
62	Gerir manutenção predial	3	14	P
63	Gerir fornecimento de gases	4	14	P
64	Capacitar usuários de equipamentos	5	14	P
65	Planejar aquisição de EMH	1	14	P
78	Notificar e trocar por motivo de desvio de qualidade	1	15	C
80	Distribuir insumos	4	15	C
81	Revisar elenco de materiais	5	15	C
83	Dimensionar pessoal	1	16	C
84	Convocar, contratar e admitir pessoal	2	16	P
86	Conceder benefícios e direitos	3	16	C
88	Gerir escala e banco de horas	4	16	P
90	Participar de evento externo	5	16	P
91	Desligar pessoal	6	16	P
92	Submeter e aprovar projetos de capacitação sem custos para o HU-UFSCar	7	16	P
94	Prover capacitação interna	8	16	P
96	Contratar capacitação para colaboradores	9	16	P
98	Avaliar desempenho de empregado em período de experiência	10	16	P
100	Participar de capacitação externa com afastamento do país - curta duração	11	16	C
102	Designar substituto de cargo ou função	12	16	P
103	Elaborar PDC	13	16	P
104	Gerir ponto eletrônico	14	16	P
105	Contratar sobrejornada	15	16	P
106	Acompanhar execução do PDC	16	16	C
107	Gerir PDI	17	16	C
108	Programar ou alterar férias	18	16	P
\.


--
-- TOC entry 2882 (class 0 OID 16409)
-- Dependencies: 208
-- Data for Name: tb_process_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_process_type (id, name, initials) FROM stdin;
1	Processos Gerenciais	PG
2	Processos Finalísticos	PF
3	Processos de Apoio	PA
\.


--
-- TOC entry 2886 (class 0 OID 16419)
-- Dependencies: 212
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tb_user (codigo, usuario, senha, permissao, nome) FROM stdin;
1	admin	$2y$10$S/3BFMP112hSDUQKLExq2ej.zR2KJRfMFSGr66M2JJLYMlBec/faa	1	Administrador
2	user	$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC	2	Usuário
3	leandro	$2y$10$UOKFYPK0Nht9IGVzObvPPeVoVDKesbJ7vlE6OzjZICQiE54iXBbZC	2	Leandro C. Ramos
\.


--
-- TOC entry 2901 (class 0 OID 0)
-- Dependencies: 203
-- Name: tb_doc_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_doc_type_id_seq', 24, true);


--
-- TOC entry 2902 (class 0 OID 0)
-- Dependencies: 214
-- Name: tb_documents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_documents_id_seq', 24, true);


--
-- TOC entry 2903 (class 0 OID 0)
-- Dependencies: 205
-- Name: tb_macroprocess_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_macroprocess_id_seq', 25, true);


--
-- TOC entry 2904 (class 0 OID 0)
-- Dependencies: 207
-- Name: tb_process_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_process_id_seq', 108, true);


--
-- TOC entry 2905 (class 0 OID 0)
-- Dependencies: 209
-- Name: tb_process_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_process_type_id_seq', 4, true);


--
-- TOC entry 2906 (class 0 OID 0)
-- Dependencies: 211
-- Name: tb_sector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_sector_id_seq', 67, true);


--
-- TOC entry 2907 (class 0 OID 0)
-- Dependencies: 213
-- Name: tb_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_user_id_seq', 3, true);


--
-- TOC entry 2740 (class 2606 OID 16494)
-- Name: tb_area tb_area_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_area
    ADD CONSTRAINT tb_area_pkey PRIMARY KEY (id);


--
-- TOC entry 2732 (class 2606 OID 16431)
-- Name: tb_doc_type tb_doc_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_doc_type
    ADD CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id);


--
-- TOC entry 2744 (class 2606 OID 16490)
-- Name: tb_documents tb_documents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_pkey PRIMARY KEY (id);


--
-- TOC entry 2734 (class 2606 OID 16433)
-- Name: tb_macroprocess tb_macroprocess_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_pkey PRIMARY KEY (id);


--
-- TOC entry 2736 (class 2606 OID 16506)
-- Name: tb_process tb_process_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process
    ADD CONSTRAINT tb_process_pkey PRIMARY KEY (id);


--
-- TOC entry 2738 (class 2606 OID 16437)
-- Name: tb_process_type tb_process_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process_type
    ADD CONSTRAINT tb_process_type_pkey PRIMARY KEY (id);


--
-- TOC entry 2742 (class 2606 OID 16439)
-- Name: tb_user usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_user
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (codigo);


--
-- TOC entry 2747 (class 2606 OID 16495)
-- Name: tb_documents tb_documents_id_area_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_area_fkey FOREIGN KEY (area) REFERENCES public.tb_area(id) NOT VALID;


--
-- TOC entry 2748 (class 2606 OID 16500)
-- Name: tb_documents tb_documents_id_doc_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_doc_type_fkey FOREIGN KEY (doc_type) REFERENCES public.tb_doc_type(id) NOT VALID;


--
-- TOC entry 2749 (class 2606 OID 16507)
-- Name: tb_documents tb_documents_id_process_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_documents
    ADD CONSTRAINT tb_documents_id_process_fkey FOREIGN KEY (process) REFERENCES public.tb_process(id);


--
-- TOC entry 2745 (class 2606 OID 16440)
-- Name: tb_macroprocess tb_macroprocess_id_proc_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_macroprocess
    ADD CONSTRAINT tb_macroprocess_id_proc_type_fkey FOREIGN KEY (id_proc_type) REFERENCES public.tb_process_type(id);


--
-- TOC entry 2746 (class 2606 OID 16445)
-- Name: tb_process tb_process_id_macroprocess_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_process
    ADD CONSTRAINT tb_process_id_macroprocess_fkey FOREIGN KEY (id_macroprocess) REFERENCES public.tb_macroprocess(id);


-- Completed on 2020-08-17 17:43:17

--
-- PostgreSQL database dump complete
--

