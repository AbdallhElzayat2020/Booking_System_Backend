<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('package_id')->nullable();
            $table->string('image');
            $table->string('thumbnail_image');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('phone', 30);
            $table->string('email', 200);
            $table->string('address');
            $table->text('website')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('x_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('whatsapp_link')->nullable();
            $table->text('google_map_embed_code')->nullable();
            $table->integer('views')->default(0);
            $table->string('attachments')->nullable();
            $table->date('expired_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('is_verified', ['yes', 'no'])->default('no');
            $table->enum('is_featured', ['yes', 'no'])->default('no');
            // seo
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
