const tbody = document.querySelector(".listar-usuarios1");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list1.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);