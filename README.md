# projeto_ditech

Desenvolva em PHP, um sistema que resolva o seguinte problema:

Devido ao grande fluxo de funcionários de uma empresa, foi identificado a
necessidade de um sistema de fila virtual para uso de salas de reuniões.

Este sistema deve obedecer os seguintes requisitos:
● Possuir cadastro de usuários (crud)
● Possuir cadastro de salas (crud)
● Login de usuários
● O sistema deve possuir uma interface em html.
● Reserva de salas por usuários
● Após logado, usuário poderá efetuar reserva de salas.
● Deverá possuir uma visualização de todas as salas e os horários vagos e
ocupados.
● Um usuário não pode reservar mais de 1 sala no mesmo período
● 1 sala não pode estar reservado por mais de 1 usuário no mesmo período,
simultaneamente.
● As reservas de salas tem duração de 1 hora, ou seja, posso reservar a sala
as 14:00, e ela estará “bloqueada” para reserva até o próximo horário 15:00.
● Deverá ser possível a remoção da reserva de uma sala apenas pelo próprio
reservante.

Para executar você precisa:
● Ter Mysqli and pdo_mysql instalado e habilitado
● Executar o arquivo (dump/dump.sql) no seu banco de dados Mysql para a criação da estrutura;
● Acessar o diretório (http://seuservidor/projeto_ditech/).