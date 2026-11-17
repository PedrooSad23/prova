
CREATE DATABASE IF NOT EXISTS avaliacao_agendamentos;

USE avaliacao_agendamentos;

CREATE TABLE paciente (
    idpaciente INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    PRIMARY KEY (idpaciente)
);

CREATE TABLE profissional (
    idprofissional INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    PRIMARY KEY (idprofissional)
);

CREATE TABLE agendamento (
    idagendamento INT NOT NULL AUTO_INCREMENT,
    idpaciente INT NOT NULL,
    idprofissional INT NOT NULL,
    data_consulta DATE NOT NULL,
    horario TIME NOT NULL,
    motivo VARCHAR(200) NOT NULL,

    PRIMARY KEY (idagendamento),

    UNIQUE KEY uk_profissional_horario
        (idprofissional, data_consulta, horario),

    UNIQUE KEY uk_paciente_horario
        (idpaciente, data_consulta, horario),

    FOREIGN KEY (idpaciente)
        REFERENCES paciente (idpaciente),

    FOREIGN KEY (idprofissional)
        REFERENCES profissional (idprofissional)
);

INSERT INTO paciente (nome, email) VALUES
('Ana Souza', 'ana@email.com'),
('Bruno Lima', 'bruno@email.com'),
('Carla Mendes', 'carla@email.com'),
('Daniel Alves', 'daniel@email.com'),
('Eduarda Costa', 'eduarda@email.com');

INSERT INTO profissional (nome, especialidade) VALUES
('Mariana Oliveira', 'Clínica Geral'),
('Ricardo Santos', 'Dermatologia'),
('Fernanda Costa', 'Nutrição');

INSERT INTO agendamento
(idpaciente, idprofissional, data_consulta, horario, motivo)
VALUES
(1, 1, '2030-01-15', '09:00:00', 'Consulta de rotina'),
(2, 1, '2030-01-15', '10:00:00', 'Avaliação clínica'),
(3, 2, '2030-01-15', '09:00:00', 'Avaliação dermatológica'),
(4, 3, '2030-01-15', '11:00:00', 'Orientação nutricional');
