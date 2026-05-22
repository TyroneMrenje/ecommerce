import { Head, useForm } from '@inertiajs/react'

export default function VerifyEmail({ status }: { status?: string }) {
    const { post, processing } = useForm({})

    function resend() {
        post('/email/verification-notification')
    }

    return (
        <>
            <Head title="Verify Email" />
            <div className="text-center">
                <h1 className="text-2xl font-medium mb-4">Verify your email</h1>
                <p className="text-gray-500 mb-6">
                    We sent a verification link to your email address. 
                    Click the link to continue.
                </p>

                {status === 'verification-link-sent' && (
                    <p className="text-green-500 mb-4">
                        A new verification link has been sent.
                    </p>
                )}

                <button
                    onClick={resend}
                    disabled={processing}
                    className="border border-gray-200 rounded-lg px-4 py-2 text-sm hover:bg-gray-100"
                >
                    {processing ? 'Sending...' : 'Resend verification email'}
                </button>
            </div>
        </>
    )
}