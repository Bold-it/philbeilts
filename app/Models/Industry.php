<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'roman',
        'title',
        'short',
        'icon',
        'color',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Returns the public URL to the industry image, or null if none uploaded.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Scope to only return active industries ordered by sort_order.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Returns the hardcoded services list for this industry's slug.
     * Services are intentionally kept static — only the card fields are DB-driven.
     */
    public function getServicesAttribute(): array
    {
        return self::servicesMap()[$this->slug] ?? [];
    }

    public static function servicesMap(): array
    {
        return [
            'real-estate'     => ['Real estate development', 'Commercial and residential construction', 'Roads and highways construction', 'Water systems construction', 'Civil engineering works', 'General construction consultancy', 'Design and build services'],
            'banking'         => ['Commercial banking', 'Corporate finance', 'Asset management', 'Project financing', 'Capital investment', 'Financial advisory'],
            'oil-gas-energy'  => ['Oil and gas exploration', 'Substations civil works', 'Electrical and mechanical engineering', 'Transmission systems construction', 'Energy infrastructure development'],
            'mining'          => ['Mining and mineral exploration', 'Aluminum and steel processing', 'Industrial manufacturing and blending', 'Industrial equipment optimization', 'Machinery, plant, and track systems'],
            'pharmaceuticals' => ['Pharmaceutical manufacturing', 'Drug distribution', 'Healthcare supply chain', 'Medical equipment supply', 'Laboratory services'],
            'logistics'       => ['Import and export logistics', 'Shipping and navigation services', 'Aviation navigation services', 'Ports and harbor management', 'Multi-purpose car, truck, and bus terminals', 'Logistics and supply chain management'],
            'agriculture'     => ['Farming and farm production', 'Food and crop processing', 'Edible processing and packaging', 'Fishing and cold storage facilities', 'Warehousing and storage systems'],
            'marine'          => ['Marine services and operations', 'Off-road equipment lubrication', 'Earth-moving machinery services', 'Railroad systems support', 'Heavy equipment maintenance'],
            'commercial'      => ['Educational development projects', 'Medical and hospital emergency centers', 'Warehouses and factory development', 'Tank farms and refineries', 'Commercial courts and multi-purpose facilities'],
        ];
    }
}
