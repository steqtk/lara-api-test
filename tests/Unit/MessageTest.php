<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    /**
     * test send message
     */
    public function testSendMessage()
    {
        $data = [
            'message_content' => Str::random('100'),
        ];

        $this->post(route('send-message'), $data)
            ->assertJson([
                'success' => true,
                'message_content' => $data['message_content'],
            ])
            ->assertStatus(201);
    }
}
