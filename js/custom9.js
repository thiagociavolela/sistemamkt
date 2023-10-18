const tbody = document.querySelector(".listar-usuarios9");

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list9.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);