const tbody = document.querySelector(".listar-usuarios7");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list7.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);