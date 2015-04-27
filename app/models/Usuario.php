<?php

use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface {

    protected $softDelete = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function candidato() {
        return $this->belongsTo('Equipo', 'id_candidato', 'id');
    }

    public function pronosticos() {
        return $this->hasMany('Pronostico', 'id_usuario', 'id');
    }

    public function isAdmin() {
        if($this->grupo == 1) {
            return true;
        } else {
            return false;
        }
    }

}
