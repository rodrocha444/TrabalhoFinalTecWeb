function deletarAnimal(cod){

    if(confirm('Você tem certeza que deseja deletar este animal?')){
        $.post("../include/deletarRegistros.php", 
        {
            idAnimalDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}