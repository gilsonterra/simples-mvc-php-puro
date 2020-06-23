<?php

namespace Model;

final class UsuarioModel extends AbstractModel
{
    public function fetchAll($filter)
    {
        $query = 'SELECT * FROM usuarios ';

        if (!empty($filter['nome_completo'])) {
            $query .= " WHERE LOWER(nome_completo) like '%" . strtolower($filter['nome_completo']) . "%' ";
        }

        return $this->get($query);
    }

    public function find($id)
    {
        try {
            $query = sprintf('SELECT * FROM usuarios WHERE usuario_id = %s', $id);
            return $this->fetch($query);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function insert($data)
    {
        if ($this->loginExist($data['login'])) {
            return array(
                'success' => false,
                'message' => 'Login já foi cadastrado.'
            );
        }

        $data['id'] = $this->getLastId() + 1;

        $query = 'INSERT INTO usuarios (usuario_id, nome_completo, login, senha, ativo) VALUES (:id, :nome_completo, :login, :senha, :ativo)';
        return $this->save($query, $data);
    }

    public function update($id, $data)
    {

        if ($this->loginExist($data['login'], $id)) {
            return array(
                'success' => false,
                'message' => 'Login já foi cadastrado.'
            );
        }

        $query = sprintf('UPDATE usuarios SET nome_completo = :nome_completo, login = :login, senha = :senha, ativo = :ativo WHERE usuario_id = %s', $id);
        return $this->save($query, $data);
    }

    public function delete($id)
    {
        $query = sprintf('DELETE FROM usuarios WHERE usuario_id = %s', $id);
        return $this->save($query);
    }

    protected function loginExist($login, $ignore = '')
    {
        $result = $this->fetch(sprintf("SELECT usuario_id FROM usuarios WHERE login = '%s'", $login));

        if($ignore && $ignore == $result['usuario_id']){
            return false;
        }

        return !empty($result);
    }

    public function getLastId()
    {
        $result = $this->fetch('SELECT max(usuario_id) id FROM usuarios');
        return $result['id'];
    }

    public function login($login, $senha)
    {
        try {
            $query = sprintf("SELECT * FROM usuarios WHERE login = '%s' AND senha = '%s'", $login, $senha);            
            return $this->fetch($query);
        } catch (\Exception $e) {
            return [];
        }
    }
}
