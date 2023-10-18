const tbody = document.querySelector(".listar-usuarios5");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list5.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);