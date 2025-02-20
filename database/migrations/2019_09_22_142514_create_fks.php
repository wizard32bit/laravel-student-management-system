<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFks extends Migration
{

    public function up()
    {
        // lgas
        Schema::table('lgas', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });

        // states
        Schema::table('states', function (Blueprint $table) {
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
        });
        
        // users
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('lga_id')->references('id')->on('lgas')->onDelete('set null');
            $table->foreign('bg_id')->references('id')->on('blood_groups')->onDelete('set null');
            $table->foreign('nal_id')->references('id')->on('nationalities')->onDelete('set null');
        });

        // my_classes
        Schema::table('my_classes', function (Blueprint $table) {
            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('set null');
        });

        // sections
        Schema::table('sections', function (Blueprint $table) {
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
        });

        // subjects
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        // student_records
        Schema::table('student_records', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('my_parent_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('dorm_id')->references('id')->on('dorms')->onDelete('set null');
        });

        // marks
        Schema::table('marks', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
        });

        // gades
        Schema::table('grades', function (Blueprint $table) {
            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('cascade');
        });

        // pins
        Schema::table('pins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });

        // exams
        // Ensure the combination of name, term, and year is unique
        Schema::table('exams', function (Blueprint $table) {
            $table->unique(['name', 'term', 'year'], 'exams_term_year_name_unique');
        });
        
        // exam_records
        Schema::table('exam_records', function (Blueprint $table) {
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });

        // books
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        // book_requests
        Schema::table('book_requests', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // staff_records
        Schema::table('staff_records', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // payments
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        // payment_records
        Schema::table('payment_records', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });

        // receipts
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreign('pr_id')->references('id')->on('payment_records')->onDelete('cascade');
        });

        // time_table_records
        Schema::table('time_table_records', function (Blueprint $table) {
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        // time_slots
        Schema::table('time_slots', function (Blueprint $table) {
            $table->foreign('ttr_id')->references('id')->on('time_table_records')->onDelete('cascade');
        });

        // time_tables
        Schema::table('time_tables', function (Blueprint $table) {
            $table->foreign('ttr_id')->references('id')->on('time_table_records')->onDelete('cascade');
            $table->foreign('ts_id')->references('id')->on('time_slots')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });

    }

    public function down()
    {
        
    }
}
