const tbody = document.querySelector(".listar-usuarios2");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list2.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);