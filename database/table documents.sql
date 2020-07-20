-- Table: public.tb_documents

-- DROP TABLE public.tb_documents;

CREATE TABLE public.tb_documents
(
    id integer NOT NULL DEFAULT nextval('tb_documents_id_seq'::regclass),
    title character varying(150) COLLATE pg_catalog."default",
    "number" integer,
    version integer,
    area integer,
    process integer,
    maker character varying(250) COLLATE pg_catalog."default",
    reviewer character varying(250) COLLATE pg_catalog."default",
    validator character varying(250) COLLATE pg_catalog."default",
    approver character varying(250) COLLATE pg_catalog."default",
    approval_date timestamp with time zone,
    situation character varying(20) COLLATE pg_catalog."default",
    status character varying(20) COLLATE pg_catalog."default",
    doc_type integer,
    created_at timestamp with time zone,
    updated_at date,
    code character varying COLLATE pg_catalog."default",
    filename_doc character varying(100) COLLATE pg_catalog."default",
    filename_pdf character varying(100) COLLATE pg_catalog."default",
    submit_user character varying(50) COLLATE pg_catalog."default",
    submit_type character varying(30) COLLATE pg_catalog."default",
    CONSTRAINT tb_documents_pkey PRIMARY KEY (id),
    CONSTRAINT tb_documents_id_area_fkey FOREIGN KEY (area)
        REFERENCES public.tb_area (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT tb_documents_id_doc_type_fkey FOREIGN KEY (doc_type)
        REFERENCES public.tb_doc_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT tb_documents_id_process_fkey FOREIGN KEY (process)
        REFERENCES public.tb_process (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE public.tb_documents
    OWNER to postgres;
-- Index: fki_tb_documents_id_area_fkey

-- DROP INDEX public.fki_tb_documents_id_area_fkey;

CREATE INDEX fki_tb_documents_id_area_fkey
    ON public.tb_documents USING btree
    (area ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: fki_tb_documents_id_process_fkey

-- DROP INDEX public.fki_tb_documents_id_process_fkey;

CREATE INDEX fki_tb_documents_id_process_fkey
    ON public.tb_documents USING btree
    (process ASC NULLS LAST)
    TABLESPACE pg_default;