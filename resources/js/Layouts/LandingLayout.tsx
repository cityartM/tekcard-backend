import React, { PropsWithChildren } from 'react';
import Header from "@/Layouts/Header";
import Footer from '@/Layouts/Footer';

export default function LandingLayout({ children, className }: PropsWithChildren & { className?: string }) {
  return (
    <div className={`${className ?? ''}` }>
      <Header />

      <main>
        {children}
      </main>

      <Footer />
    </div>
  );
}


