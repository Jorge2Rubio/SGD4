<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\Comment;
use App\Models\Donation;

class DashboardStats extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Donations This Month', '₱' . number_format(
                Donation::whereMonth('created_at', now()->month)->sum('amount')
            ))
                ->description('This month')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),

            Card::make('Total Comments', Comment::count())
                ->description('User feedback')
                ->descriptionIcon('heroicon-o-chat-bubble-oval-left')
                ->color('info'),

            Card::make('Total Posts', Post::count())
                ->description('Published Articles')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('primary'),

            Card::make('Latest 5 Donations', function () {
                return Donation::latest()
                    ->take(5)
                    ->get()
                    ->map(function ($donation) {
                        return '₱' . number_format($donation->amount) . ' - ' . $donation->created_at->diffForHumans();
                    })->implode(', ');
            })
                ->description('Most recent donations')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning'),

            Card::make('Recent Post', function () {
                $post = Post::latest('created_at')->first();
                return $post ? '"' . $post->title . '" - Published ' . $post->created_at->diffForHumans() : 'No posts yet';
            })
                ->description('Latest Blog Article')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('secondary'),

            Card::make('Quick Actions', "
➕ Go to 'Posts' > Click 'Add Post'
➕ Go to 'Donations' > Click 'Add Donation'
            ")
                ->description('Use the sidebar to add new content')
                ->descriptionIcon('heroicon-o-plus-circle')
                ->color('info'),
        ];
    }
}
