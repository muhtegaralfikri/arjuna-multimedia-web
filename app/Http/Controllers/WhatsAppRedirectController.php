<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Package;
use App\Models\WhatsappClick;
use Illuminate\Http\Request;

class WhatsAppRedirectController extends Controller
{
    public function package(Request $request, Package $package)
    {
        $contact = Contact::getContact();

        if (!$contact) {
            return redirect()->route('contact');
        }

        $this->recordClick($request, 'package', $contact->whatsapp_number, $package);

        return redirect()->away($contact->whatsappLinkForPackage($package->name));
    }

    public function coverage(Request $request)
    {
        $contact = Contact::getContact();

        if (!$contact) {
            return redirect()->route('contact');
        }

        $message = "Halo Arjuna Net, saya ingin cek coverage pemasangan.\n\nNama:\nAlamat lengkap:\nPatokan lokasi:\nPaket diminati:\nWaktu bisa dihubungi:";

        $this->recordClick($request, 'coverage', $contact->whatsapp_number);

        return redirect()->away($contact->whatsappLinkForMessage($message));
    }

    public function support(Request $request)
    {
        $contact = Contact::getContact();

        if (!$contact) {
            return redirect()->route('contact');
        }

        $message = "Halo Arjuna Net, internet saya masih gangguan setelah restart modem.\n\nNama pelanggan:\nNo pelanggan jika ada:\nAlamat:\nKendala:\nLampu indikator modem/ONT:";

        $this->recordClick($request, 'support', $contact->whatsapp_number);

        return redirect()->away($contact->whatsappLinkForMessage($message));
    }

    public function general(Request $request)
    {
        $contact = Contact::getContact();

        if (!$contact) {
            return redirect()->route('contact');
        }

        $this->recordClick($request, 'general', $contact->whatsapp_number);

        return redirect()->away($contact->whatsapp_link);
    }

    private function recordClick(Request $request, string $source, string $targetNumber, ?Package $package = null): void
    {
        WhatsappClick::create([
            'source' => $source,
            'package_id' => $package?->id,
            'target_number' => $targetNumber,
            'landing_path' => $request->headers->get('referer'),
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
        ]);
    }
}
