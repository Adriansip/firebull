<?php

use Illuminate\Database\Seeder;
use App\Curso;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso=new Curso();
        $curso->curso='Procedimientos y Condiciones de seguridad e higiene en los centros de trabajo';
        $curso->norma='NOM-001-STPS-2008';
        $curso->save();

        $curso=new Curso();
        $curso->curso='Procedimientos de seguridad en prevención y protección contra incendios';
        $curso->norma='NOM-002-STPS-2010';
        $curso->save();

        $curso=new Curso();
        $curso->curso='Procedimientos de seguridad al realizar las operaciones de manejo, transporte y almacenamiento de sustancias químicas peligrosas';
        $curso->norma='NOM-005-STPS-1998';
        $curso->save();

        $curso=new Curso();
        $curso->curso='Procedimientos de seguridad e higiene en el manejo, almacenamiento y carga de materiales';
        $curso->norma='NOM-006-STPS-2000';
        $curso->save();

        $curso=new Curso();
        $curso->curso='Procedimientos y condiciones de seguridad para realizar trabajos en alturas';
        $curso->norma='NOM-009-STPS-2011';
        $curso->save();

        $curso=new Curso();
        $curso->curso='Procedimientos y Condiciones de seguridad e higiene en los centros de trabajo';
        $curso->norma='NOM-001-STPS-2008';
        $curso->save();
    }
}
