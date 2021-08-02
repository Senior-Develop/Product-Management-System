<?php
namespace App\Exports;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    protected $startDate;
    protected $endDate;
    protected $condition;
    protected $clientName;
    protected $cityName;
    protected $age;
    protected $gender;

    function __construct($startDate, $endDate, $condition, $clientName, $cityName, $age, $gender) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->condition = $condition;
        $this->clientName = $clientName;
        $this->cityName = $cityName;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function collection()
    {
        $userTable = User::getTableName();

        $query = User::where('paper', User::Client)->select("*");

        if($this->startDate != null && $this->endDate != null){
            $query->whereBetween($userTable.".updated_at", [$this->startDate, $this->endDate]);
        }

        if ($this->condition != "0" && $this->condition != null){
            $query->where($userTable.".condition", $this->condition);
        }

        if ($this->clientName != ""  && $this->clientName != null){
            $query->where($userTable.".name", "LIKE", '%' . $this->clientName . '%');
        }

        if ($this->cityName != ""  && $this->cityName != null){
            $query->where($userTable.".address", "LIKE", '%' . $cityName . '%');
        }

        if ($this->age != ""  && $this->age != null){
            $query->where(DB::raw('(Year(now()) - Year(birthday))'), $age);
        }

        if ($this->condition != ""  && $this->condition != null && $this->condition != 0){
            $query->where('condition', $condition);
        }

        if ($this->gender != ""  && $this->gender != null && $this->gender != 0){
            $query->where('gender', $gender);
        }

        $customers = $query->get();
        return $customers;
    }
}