PGDMP      	                 }            evaluacion_7jrj    16.6 (Debian 16.6-1.pgdg120+1)    16.4     -           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            .           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            /           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            0           1262    16389    evaluacion_7jrj    DATABASE     z   CREATE DATABASE evaluacion_7jrj WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.UTF8';
    DROP DATABASE evaluacion_7jrj;
                evaluacion_7jrj_user    false            1           0    0    evaluacion_7jrj    DATABASE PROPERTIES     8   ALTER DATABASE evaluacion_7jrj SET "TimeZone" TO 'utc';
                     evaluacion_7jrj_user    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                evaluacion_7jrj_user    false            �            1259    16398 	   registros    TABLE     �   CREATE TABLE public.registros (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    contrasena character varying(255) NOT NULL,
    correo character varying(100) NOT NULL
);
    DROP TABLE public.registros;
       public         heap    evaluacion_7jrj_user    false    5            �            1259    16401    registros_id_seq    SEQUENCE     �   CREATE SEQUENCE public.registros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.registros_id_seq;
       public          evaluacion_7jrj_user    false    215    5            2           0    0    registros_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.registros_id_seq OWNED BY public.registros.id;
          public          evaluacion_7jrj_user    false    216            �            1259    16402    usuarios    TABLE     �   CREATE TABLE public.usuarios (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    contrasena character varying(255) NOT NULL
);
    DROP TABLE public.usuarios;
       public         heap    evaluacion_7jrj_user    false    5            �            1259    16405    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public          evaluacion_7jrj_user    false    217    5            3           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public          evaluacion_7jrj_user    false    218            �           2604    16406    registros id    DEFAULT     l   ALTER TABLE ONLY public.registros ALTER COLUMN id SET DEFAULT nextval('public.registros_id_seq'::regclass);
 ;   ALTER TABLE public.registros ALTER COLUMN id DROP DEFAULT;
       public          evaluacion_7jrj_user    false    216    215            �           2604    16407    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public          evaluacion_7jrj_user    false    218    217            '          0    16398 	   registros 
   TABLE DATA           D   COPY public.registros (id, usuario, contrasena, correo) FROM stdin;
    public          evaluacion_7jrj_user    false    215   �       )          0    16402    usuarios 
   TABLE DATA           ;   COPY public.usuarios (id, usuario, contrasena) FROM stdin;
    public          evaluacion_7jrj_user    false    217          4           0    0    registros_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.registros_id_seq', 4, true);
          public          evaluacion_7jrj_user    false    216            5           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 1, false);
          public          evaluacion_7jrj_user    false    218            �           2606    16409    registros registros_correo_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_correo_key UNIQUE (correo);
 H   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_correo_key;
       public            evaluacion_7jrj_user    false    215            �           2606    16411    registros registros_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_pkey;
       public            evaluacion_7jrj_user    false    215            �           2606    16413    registros registros_usuario_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_usuario_key UNIQUE (usuario);
 I   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_usuario_key;
       public            evaluacion_7jrj_user    false    215            �           2606    16415    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            evaluacion_7jrj_user    false    217            �           2606    16417    usuarios usuarios_usuario_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_usuario_key UNIQUE (usuario);
 G   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_usuario_key;
       public            evaluacion_7jrj_user    false    217            �           826    16391     DEFAULT PRIVILEGES FOR SEQUENCES    DEFAULT ACL     [   ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON SEQUENCES TO evaluacion_7jrj_user;
                   postgres    false            �           826    16393    DEFAULT PRIVILEGES FOR TYPES    DEFAULT ACL     W   ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON TYPES TO evaluacion_7jrj_user;
                   postgres    false            �           826    16392     DEFAULT PRIVILEGES FOR FUNCTIONS    DEFAULT ACL     [   ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON FUNCTIONS TO evaluacion_7jrj_user;
                   postgres    false            �           826    16390    DEFAULT PRIVILEGES FOR TABLES    DEFAULT ACL     X   ALTER DEFAULT PRIVILEGES FOR ROLE postgres GRANT ALL ON TABLES TO evaluacion_7jrj_user;
                   postgres    false            '   k   x�3�LL����T1�T14PI7ͯ*.4J/)/��t7(�2L���NN���(�00r��0+�JϪ(��/4�r��,N��,J)-J�3400pH�M���K������� U� 1      )      x������ � �     