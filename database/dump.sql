PGDMP                          x         
   projeto_db    12.1    12.1                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    24724 
   projeto_db    DATABASE     �   CREATE DATABASE projeto_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE projeto_db;
                postgres    false            �            1259    24733    tb_doc_type    TABLE     y   CREATE TABLE public.tb_doc_type (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    level bigint
);
    DROP TABLE public.tb_doc_type;
       public         heap    postgres    false            �            1259    24744    tb_doc_type_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_doc_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.tb_doc_type_id_seq;
       public          postgres    false    204                       0    0    tb_doc_type_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.tb_doc_type_id_seq OWNED BY public.tb_doc_type.id;
          public          postgres    false    205            �            1259    24752 	   tb_sector    TABLE     �   CREATE TABLE public.tb_sector (
    id integer NOT NULL,
    initials character varying(10),
    name character varying(200)
);
    DROP TABLE public.tb_sector;
       public         heap    postgres    false            �            1259    24755    tb_sector_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_sector_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tb_sector_id_seq;
       public          postgres    false    206                       0    0    tb_sector_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tb_sector_id_seq OWNED BY public.tb_sector.id;
          public          postgres    false    207            �            1259    24727    tb_user    TABLE     �   CREATE TABLE public.tb_user (
    codigo bigint NOT NULL,
    usuario character varying(50) NOT NULL,
    senha character varying(120) NOT NULL,
    permissao smallint NOT NULL
);
    DROP TABLE public.tb_user;
       public         heap    postgres    false            �            1259    24725    usuario_codigo_seq    SEQUENCE     {   CREATE SEQUENCE public.usuario_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.usuario_codigo_seq;
       public          postgres    false    203                       0    0    usuario_codigo_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.usuario_codigo_seq OWNED BY public.tb_user.codigo;
          public          postgres    false    202            �
           2604    24746    tb_doc_type id    DEFAULT     p   ALTER TABLE ONLY public.tb_doc_type ALTER COLUMN id SET DEFAULT nextval('public.tb_doc_type_id_seq'::regclass);
 =   ALTER TABLE public.tb_doc_type ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204            �
           2604    24757    tb_sector id    DEFAULT     l   ALTER TABLE ONLY public.tb_sector ALTER COLUMN id SET DEFAULT nextval('public.tb_sector_id_seq'::regclass);
 ;   ALTER TABLE public.tb_sector ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206            �
           2604    24730    tb_user codigo    DEFAULT     p   ALTER TABLE ONLY public.tb_user ALTER COLUMN codigo SET DEFAULT nextval('public.usuario_codigo_seq'::regclass);
 =   ALTER TABLE public.tb_user ALTER COLUMN codigo DROP DEFAULT;
       public          postgres    false    202    203    203                      0    24733    tb_doc_type 
   TABLE DATA           6   COPY public.tb_doc_type (id, name, level) FROM stdin;
    public          postgres    false    204   w                 0    24752 	   tb_sector 
   TABLE DATA           7   COPY public.tb_sector (id, initials, name) FROM stdin;
    public          postgres    false    206   q                 0    24727    tb_user 
   TABLE DATA           D   COPY public.tb_user (codigo, usuario, senha, permissao) FROM stdin;
    public          postgres    false    203                     0    0    tb_doc_type_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.tb_doc_type_id_seq', 27, true);
          public          postgres    false    205                        0    0    tb_sector_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.tb_sector_id_seq', 71, true);
          public          postgres    false    207            !           0    0    usuario_codigo_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.usuario_codigo_seq', 2, true);
          public          postgres    false    202            �
           2606    24751    tb_doc_type tb_doc_type_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.tb_doc_type
    ADD CONSTRAINT tb_doc_type_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.tb_doc_type DROP CONSTRAINT tb_doc_type_pkey;
       public            postgres    false    204            �
           2606    24732    tb_user usuario_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.tb_user
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (codigo);
 >   ALTER TABLE ONLY public.tb_user DROP CONSTRAINT usuario_pkey;
       public            postgres    false    203               �   x�EPKNC1\;��	��W~k
�G��X�UEJ�*�*�ÚS�b8yE�<��x�0PD�~`�������/#l0Ϙt\�+�=�t�ӏD��9W�2�ȹ�n`*�+؉���]�SVt�М��+5?Ђ[Uz��+�9�fn��<�=�GX�����ǣP�*�[�K��vCUJ��Ol��C9}���[�����ĞӾ���h��)��s!ݽ4R{��]/�^P��Ƙ_T�hc         �  x��V�r�6<_��&�^��,Rn�6-J>����hR���&��n�O�\r句AJ"��aOz�g��3�O�MB�jϵ�%�y�]f��	6Q�&A��Ri���Z2o�����!�tH�6qD��b��F$Y�C�hU�L�w4&�̹涐�;!�)5+Ł�	��4�^�[���+���KY�_��%�O5�FH�q/��K%�W$
f$al�SGy3!�̸Њ^�hz�C6ٞ�ޱ-�Q�'Q�0O��97��+���$��@7��\d��C�$��i�|��%�p�{��ʋ���Ŕ"�=��f��{eR�Kҫ�s�{�5B��|兕�>cp��ʂ��$�-��3�w�W��B��(Y	�+�Χ�\X���5I�~����X�C��̤*ꗭ�mpa���;��\���nnl��ZX�>)ג;��>M޽�}�
�>G��o+���$,f��I�Y��!��J��Y�l��B��G��J�Ϲ�i e�]�Rm/<����ٝF�J*�SkL����J�Z�.:�|��g��]��N뮤�K�	B��m�gǄJ�U;tp���<2d�Ds��,;ypp4�&%�Sܛ���0_?�oѥ��1ǔyU���&0q!�ǁ	DQ0G��p����þ��JZ���;�ݘ<8��F@D;�[!�q��Q�d�نc�q4
��4l��*	�n�t8���^w^a�^�Eɒ=����2�����3a2�3��We+	/�]�-�#h�}���`5/n�0����x��U�v�-����l�>����� .nNMs�Y^�'��lX��2i�;�،��&袟��@�����v��^�QUrlP���ƎL���k��/�K�a!��_n��.��u�=�	�_�h����B4��Mm�Hg������e��b=}�	fE�s<i��� I?����+���3}�:�4�:�V�m��������ة?��F��'�8C�V��))p�V��I�{�5C�$rC�'���\IܸE��mz[��װ�n��u���p4q�O��N ��I�_��>�@��ԅ6C[�rA�����'�ʥ�n��uϔ�I�	tzppb+������ÍPx��9�[��h_�z�Pu�d��1
����I��)�gWd��x���	�\$��￰��2��gJ��[��0         �   x�5�=�0 й=3�OŸ�Zj"ĥh	�J��;��R�[G|b��qC.	�.���%��	z0��Z���8(M*>��b�J!��g=��B����>v�C��h)u�(}���1p�:Ա���n۟ܦ�೉1�j*-     