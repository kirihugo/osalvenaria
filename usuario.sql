CREATE TABLE `usuario` (
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL
)

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('1234', '124@gmail.com', '$2y$10$N9cpsEt2LU0qtSqnMi9ASesFGtpYmdg93gWMUYGWRDv8UYg.OU.MS'),
('kiri', 'gusantos@gmail.com', '$2y$10$lnn0BxMQp2TvXG7L6YtIpegFuABOjXLOAy1C2Jb.5Oc4JN4GGSKNC');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
