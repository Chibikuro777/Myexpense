<?php
    Class expense{
        // プルダウン要素を連想配列化
        public 
        $category_data = [
                            'Food',
                            'Snack/Sweets',
                            'Dine_out',
                            'Living_expenses',
                            'Entertainment_expenses'
        ];

        public function __construct($post)
        {
            $this->post = $post;
        }

        public function isBalance($income, $expense)
        {
            $sum = $income - $expense;
            return $sum;
        }

        // public function isTotalExpense($expense)
        // {
        //     $this->post = $_POST;
        //     if(!empty($this->post["expense"]))
        //     $expense = $this->post["expense"];
        //     return $expense;
        // }

        public function OutputCategory()
        {
            foreach($this->category_data as $category_data_val){
                echo "<option value={$category_data_val}>{$category_data_val}</option>";
            }
        }
    }