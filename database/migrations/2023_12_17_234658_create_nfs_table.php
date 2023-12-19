<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nfs', function (Blueprint $table) {
            $table->id();         
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('nf_code', 9)->unique();
            $table->float('value');
            $table->date('date_issue');
            $table->string('sender_cnpj', 14);
            $table->string('sender_name', 100);
            $table->string('delivery_cnpj', 14);
            $table->string('delivery_name', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            
            //numero - Identificador único do documento String Deve possuir exatos 9 dígitos.
            //valor  - Valor da nota fiscal Numérico Precisa ser maior que 0.
            //data_emissao - Dia da emissão do documento. Data Não pode ser uma data no futuro.
            //cnpj_remetente - Identificador do remetente da nota. String Precisa ter validação se é um cnpj válido.
            //nome_remetente - Nome do remetente da nota String No máximo 100 caracteres.
            //cnpj_transportador - Identificador do transportador da nota. String Precisa ter validação se é um cnpj válido.
            //nome_transportador - Nome do transportador da nota String No máximo 100 caracteres.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfs');
    }
};
