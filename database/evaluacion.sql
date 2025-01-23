PGDMP      3    	             }         
   evaluacion    17.0    17.0     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    19131 
   evaluacion    DATABASE     }   CREATE DATABASE evaluacion WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE evaluacion;
                     postgres    false            �            1259    19142 	   registros    TABLE     �   CREATE TABLE public.registros (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    contrasena character varying(255) NOT NULL,
    correo character varying(100) NOT NULL
);
    DROP TABLE public.registros;
       public         heap r       postgres    false            �            1259    19141    registros_id_seq    SEQUENCE     �   CREATE SEQUENCE public.registros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.registros_id_seq;
       public               postgres    false    220            �           0    0    registros_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.registros_id_seq OWNED BY public.registros.id;
          public               postgres    false    219            �            1259    19133    usuarios    TABLE     �   CREATE TABLE public.usuarios (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    contrasena character varying(255) NOT NULL
);
    DROP TABLE public.usuarios;
       public         heap r       postgres    false            �            1259    19132    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public               postgres    false    218            �           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public               postgres    false    217            '           2604    19145    registros id    DEFAULT     l   ALTER TABLE ONLY public.registros ALTER COLUMN id SET DEFAULT nextval('public.registros_id_seq'::regclass);
 ;   ALTER TABLE public.registros ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    219    220    220            &           2604    19136    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    218    217    218            �          0    19142 	   registros 
   TABLE DATA           D   COPY public.registros (id, usuario, contrasena, correo) FROM stdin;
    public               postgres    false    220   �       �          0    19133    usuarios 
   TABLE DATA           ;   COPY public.usuarios (id, usuario, contrasena) FROM stdin;
    public               postgres    false    218          �           0    0    registros_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.registros_id_seq', 4, true);
          public               postgres    false    219            �           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 1, false);
          public               postgres    false    217            -           2606    19151    registros registros_correo_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_correo_key UNIQUE (correo);
 H   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_correo_key;
       public                 postgres    false    220            /           2606    19147    registros registros_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_pkey;
       public                 postgres    false    220            1           2606    19149    registros registros_usuario_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_usuario_key UNIQUE (usuario);
 I   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_usuario_key;
       public                 postgres    false    220            )           2606    19138    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public                 postgres    false    218            +           2606    19140    usuarios usuarios_usuario_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_usuario_key UNIQUE (usuario);
 G   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_usuario_key;
       public                 postgres    false    218            �   k   x�3�LL����T1�T14PI7ͯ*.4J/)/��t7(�2L���NN���(�00r��0+�JϪ(��/4�r��,N��,J)-J�3400pH�M���K������� U� 1      �      x������ � �     